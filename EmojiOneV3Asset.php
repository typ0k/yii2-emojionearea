<?php

namespace mervick\emojionearea;

/**
 * Class EmojiOneAsset
 * @package mervick\emojionearea
 */
class EmojiOneV3Asset extends \yii\web\AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/emojione/emojione';


    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->js = [!YII_DEBUG ? 'lib/js/emojione.min.js' : 'lib/js/emojione.js'];
        $this->css = [!YII_DEBUG ? 'extras/css/emojione.min.css' : 'extras/css/emojione.css'];

        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function publish($am)
    {
        parent::publish($am);

        $js = <<<JS
    emojione.imagePathPNG = '{$this->baseUrl}/assets/png/';
JS;
        \Yii::$app->view->registerJs($js);
    }
}