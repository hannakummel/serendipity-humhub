<?php
/**
 * Created by PhpStorm.
 * User: stefa
 * Date: 24.07.2017
 * Time: 20:27
 */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<div id="comment_create_form_<?php echo $id; ?>" class="comment_create" data-ui-widget="comment.Form">

    <?php echo Html::beginForm('#'); ?>
    <?php echo Html::hiddenInput('contentModel', $modelName); ?>
    <?php echo Html::hiddenInput('contentId', $modelId); ?>

    <?= humhub\widgets\RichtextField::widget([
        'id' => 'newCommentForm_' . $id,
        'placeholder' => Yii::t('CommentModule.widgets_views_form', 'Write a new comment...'),
        'name' => 'message'
    ]); ?>

    <div class="comment-buttons">
        <?= humhub\modules\file\widgets\UploadButton::widget([
            'id' => 'comment_create_upload_' . $id,
            'progress' => '#comment_create_upload_progress_' . $id,
            'preview' => '#comment_create_upload_preview_' . $id,
            'dropZone' => '#comment_create_form_'.$id,
            'max' => Yii::$app->getModule('content')->maxAttachedFiles
        ]); ?>

        <a href="#" class="btn btn-sm btn-default btn-comment-submit pull-left"
           data-action-click="submit"
           data-action-url="<?= Url::to(['/comment/comment/post']) ?>"
           data-ui-loader
           onclick="setTimeout(function() { $('#wallStream').masonry('layout'); }, 1500);"
        >
            <?= Yii::t('CommentModule.widgets_views_form', 'Send') ?>
        </a>
    </div>

    <?php echo Html::endForm(); ?>

    <div id="comment_create_upload_progress_<?= $id ?>" style="display:none;margin:10px 0px;"></div>

    <?= \humhub\modules\file\widgets\FilePreview::widget([
        'id' => 'comment_create_upload_preview_' . $id,
        'options' => ['style' => 'margin-top:10px'],
        'edit' => true
    ])?>

</div>
