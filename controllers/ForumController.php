<?php

namespace app\controllers;

use app\models\Forum;
use app\models\Replys;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\IdentityInterface;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ForumController implements the CRUD actions for Forum model.
 */
class ForumController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Forum models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout = 'forum_layout';

        $forum = Forum::find()
            ->select(['Forum.*', 'User.username'])
            ->where(['Visible' => 1])
            ->innerJoin('User', 'Forum.user_id = User.id')
            ->all();

        return $this->render('index', [
            'forum' => $forum,
        ]);
    }

    /**
     * Displays a single Forum model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $this->layout = 'forum_layout';
        $userId = \Yii::$app->user->identity->getId();

        $forum_users = Forum::find()->where(['id' => $id ])->one();
        $forum_user_id = $forum_users->user_id;

        $forum = Forum::find()
            ->select(['Forum.*'])
            ->where(['id' => $id])
            ->all();

        $forum_title = Forum::find()
            ->select('title')
            ->where(['id' => $id])
            ->one();

        $replys = Replys::find('Reply.*')
            ->where(['forum_id' => $id])
            ->all();


        return $this->render('view', [
            'model' => $this->findModel($id),
            'replys' => $replys,
            'forum_title' => $forum_title,
            'forum' => $forum,
            'userId' => $userId,
            'forum_user_id' => $forum_user_id,

        ]);
    }

    /**
     * Creates a new Forum model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Forum();
        $model->user_id = Yii::$app->user->id;
        $model->save();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Forum model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Forum model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Forum model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Forum the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Forum::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
