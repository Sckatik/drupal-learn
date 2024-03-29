<?php
namespace Drupal\dsimakov_paragraphs\Plugin\paragraphs\Behavior;
use Drupal\Core\Entity\Display\EntityViewDisplayInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\paragraphs\Annotation\ParagraphsBehavior;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\paragraphs\Entity\ParagraphsType;
use Drupal\paragraphs\ParagraphInterface;
use Drupal\paragraphs\ParagraphsBehaviorBase;
/*
* @ParagraphsBehavior (
*    id = bonodig_paragraphs_gallery,
*    label = @Translation ("Gallery settings"),
*    description = @Translation("settings for gallery paragraph type."),
*    weight = 0,
* )
*/
class GalleryBehavior extends ParagraphsBehaviorBase {

    /**
     * {@inheritdoc}
    */
    public static function isApplicable(ParagraphsType $paragraphs_type) {
        return  TRUE; //$paragraphs_type->id() == 'gallery';
        //parent::isApplicable($paragraphs_type);
    }


    public function view(array &$build, Paragraph $paragraph, EntityViewDisplayInterface $display, $view_mode) { 

    }

    /**
   * {@inheritdoc}
   */
  public function buildBehaviorForm(ParagraphInterface $paragraph, array &$form, FormStateInterface $form_state) {
        $form['items_per_row'] = [
            "#type" => 'select',
            "#title"=> $this->t('Number of images per row'),
            "#options" => [
                '2' => $this->formatPlural(2, '1 photo per row', '@count photos per row'),
                '3' => $this->formatPlural(3, '1 photo per row', '@count photos per row'),
                '4' => $this->formatPlural(4, '1 photo per row', '@count photos per row')
            ]
        ];

        return $form;
  }

}