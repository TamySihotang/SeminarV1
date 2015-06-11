<?php

namespace console\controllers;

use yii\console\Controller;
use Yii;
class RbacController extends Controller
{
     public function actionInit() {
        $auth = Yii::$app->authManager;

        // add "view" permission
        $view = $auth->createPermission('view');
        $view->description = 'View';
        $auth->add($view);

        // add "create" permission
        $create = $auth->createPermission('create');
        $create->description = 'Create';
        $auth->add($create);

        // add "update" permission
        $update = $auth->createPermission('update');
        $update->description = 'Update';
        $auth->add($update);

        // add "delete" permission
        $delete = $auth->createPermission('delete');
        $delete->description = 'Delete';
        $auth->add($delete);

               
        // add "viewer" role and give this role the "index view" permission
        $viewer = $auth->createRole('viewer');
        $auth->add($viewer);
        $auth->addChild($viewer, $view);        
        
        // add "peserta" role and give this role the "create" permission
        $peserta = $auth->createRole('peserta');
        $auth->add($peserta);
        $auth->addChild($peserta, $create);
        $auth->addChild($peserta, $viewer);

        // add "reviewer" role and give this role the "edit/update" permission
        $reviewer = $auth->createRole('reviewer');
        $auth->add($reviewer);
        $auth->addChild($reviewer, $update);
        $auth->addChild($reviewer, $peserta);
        $auth->addChild($reviewer, $viewer);

        // add "admin" role and give this role the "updatePost" permission
        // as well as the permissions of the "peserta" role
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $delete);
        $auth->addChild($admin, $peserta);
        $auth->addChild($admin, $reviewer);
        $auth->addChild($admin, $viewer);

        // Assign roles to users. 1 and 2 are IDs returned by IdentityInterface::getId()
        // usually implemented in your User model.
        $auth->assign($admin, 1);
    }

}
