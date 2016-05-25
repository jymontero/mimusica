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
                    'class' => 'navbar-default navbar-fixed-top navbar-inverse',
                    'style' => ' color: blue;;',
                ],
            ]);
            $navItems = [
                ['label' => \Yii::t("yii", \Yii::t("yii", 'Home')), 'url' => ['/site/index']],
                ['label' => \Yii::t("yii", \Yii::t("yii", 'About')), 'url' => ['/site/about']],
                ['label' => \Yii::t("yii", \Yii::t("yii", 'Contact')), 'url' => ['/site/contact']]
            ];
            if (Yii::$app->user->isGuest) {
                
            } else {
                array_push($navItems, ['label' => \Yii::t("yii", \Yii::t("yii", 'Logout')) . ' (' . Yii::$app->user->identity->email . ')',
                    'url' => ['/site/logout'],
                    'linkOptions' => ['data-method' => 'post']]
                );
                array_push($navItems, ['label' => \Yii::t("yii", 'admin'),
                    'url' => ['/administrador/index'],
                    'linkOptions' => ['data-method' => 'post']]
                );
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav'],
                'items' => $navItems,
            ]);
            ?>
            <?php echo Html::beginForm(Url::to(['/admin']), 'post', ['class' => 'navbar-form navbar-center']) ?>
            <div class="form-group input-group">
                <span class="input-group-btn">
                    <?php echo Html::submitButton('<span class="glyphicon glyphicon-search"></span>', ['class' => 'btn btn-default']); ?>
                </span>
                <?php echo Html::input('text', ['class' => 'form-control', 'placeholder' => 'Search']); ?>
                <span class="input-group-btn">
                    <?php echo Html::submitButton('<span class="glyphicon glyphicon-search"></span>', ['class' => 'btn btn-default']); ?>
                </span>
            </div>
            <?php echo Html::endForm() ?>

            <div class="">
                <div class="navbar-header">

                    <form class="navbar-form navbar-center " role="search">
                        <div class="form-group input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">por cancion
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </button>
                            </span>
                            <input type="text" id="txtplaceholder" class="form-control" placeholder="Search..">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>        
                        </div>
                    </form>

                </div>
            </div>

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
