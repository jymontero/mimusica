<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use app\models\LoginForm;
use yii\helpers\Url;
use app\models\UsuarioSearch;

AppAsset::register($this);
?>
<?php
$this->beginPage();
$model = new LoginForm();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'MiMusica',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default navbar-fixed-top ',
                    'style' => ' color: red',
                ],
            ]);

            $modelSearch = new UsuarioSearch;
            $navItems = [
                ['label' => \Yii::t("yii", \Yii::t("yii", 'Home')), 'url' => ['/site/index']],
                ['label' => \Yii::t("yii", \Yii::t("yii", 'About')), 'url' => ['/site/about']],
                ['label' => \Yii::t("yii", \Yii::t("yii", 'Contact')), 'url' => ['/site/contact']],
            ];
            if (!Yii::$app->user->isGuest) {

                array_push($navItems, ['label' => \Yii::t("yii", 'Lista Usuarios'),
                    'url' => ['/admin/index'],
                    'linkOptions' => ['data-method' => 'post']]
                );
                array_push($navItems, [
                    'label' => 'Perfil',
                    'items' => [
                        'label' => \Yii::t("yii", 'Perfil'),
                        Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->email . ')', ['class' => 'btn btn-link']
                        ) . Html::endForm() . '</li>',
                    ]
                        ]
                );
            }
            ?>
            <div class="navbar-header">
                <?php echo Html::beginForm(Url::to(['/admin']), 'get', ['class' => 'navbar-form navbar-center  ']); ?>
                <div class="form-group input-group">
                    <?php
                    echo Html::activeTextInput($modelSearch, 'nombre_apellido', ['class' => 'form-control', 'style' => 'min-width:250px',
                        'placeholder' => \Yii::t("yii", 'Search by song or artist'),
                    ]);
                    ?>
                    <span class="input-group-btn">
                        <?php echo Html::submitButton('<span class="glyphicon glyphicon-search"></span>', ['class' => 'btn btn-default']); ?>
                    </span>
                </div>
                <?php echo Html::endForm() ?>
            </div>

            <?php
            echo Nav::widget([
                'options' => ['class' => 'nav navbar-nav  '],
                'items' => $navItems,
            ]);
            ?>

            <ul class="nav navbar-nav navbar-right">
                <li class="divider"></li>
                <?php if (Yii::$app->user->isGuest): ?>
                    <li class="dropdown" >
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle" >Entrar <span class="glyphicon glyphicon-log-in"></span><b class="caret"></b></a>
                        <div class="dropdown-menu" >
                            <?php
                            $form = ActiveForm::begin([
                                        'id' => 'login-form',
                                        'options' => ['class' => 'navbar-form navbar-center '],
                                        'enableAjaxValidation' => 'true',
                                        'enableClientValidation' => 'flase',
                                        'fieldConfig' => [
                                            'template' => "<div class=\" \">{input}</div>\n<div class=\"\">{error}</div>",
                                        ],
                                        'action' => ['/site/login'],
                            ]);
                            ?>
                            <?=
                            $form->field($model, 'email', ['inputOptions' => [
                                    'placeholder' => 'correo electronico',
                                ],
                            ])->label("");
                            ?>
                            <?=
                            $form->field($model, 'password', ['inputOptions' => [
                                    'placeholder' => 'Contraseña',
                                ],
                                    ]
                            )->passwordInput()->label("")
                            ?>

                            <?=
                            $form->field($model, 'rememberMe')->checkbox([
                                'template' => "<div class=\"\">{input} {label}</div>",
                            ])
                            ?>
                            <div class="row">
                                <a class="small col-lg-8" href="recoverypass">Olvide mi cotrasenia</a>
                                <a class="small col-lg-8" href="#"><?= \Yii::t("yii", 'Signup') ?></a>
                            </div> 	
                            <br />
                            <div class="form-group">
                                <div class="col-lg-offset-4 col-lg-2">
                                    <?= Html::submitInput('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                </div>
                            </div>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </li>
                    <?php
                endif;
                ?>
            </ul>
            <?php
            NavBar::end();
            ?>

            <div class="container">

                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
