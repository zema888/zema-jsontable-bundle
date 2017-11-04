<?php

namespace Zema\Bundle\JsontableBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormView;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;

/**
 * Виджет "Массив в виде таблицы"
 *
 * Class JsontableType
 */
class JsontableType extends AbstractType
{
    protected $choices = array();
    protected $name = 'jsontable';

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

    }

    /**
     * Дефолтные значения
     *
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setOptional(array(
            'keys',
            'labeles',
            'fixed_row',
            'min',
            'max'
        ));

        $resolver->setDefaults(array(
            'required'  => false,
            'multiple'  => true,
            'expanded'  => true,
            'fixed_row' => false,
            'min' => 0,
            'max' => 0
        ));
    }

    /**
     * Инициализация переменных для шаблона виджета
     *
     * @param FormView $view
     * @param FormInterface $form
     * @param array $options
     */
    public function buildView(FormView $view, FormInterface $form, array $options)
    {
        $view->vars['field_name'] = $form->getName();
        $view->vars['form_name'] = $form->getParent()->getName();
        $view->vars['keys'] = $options['keys'];
        $view->vars['labeles'] = $options['labeles'];
        $view->vars['fixed_row'] = $options['fixed_row'];
        $view->vars['min'] = $options['min'];
        $view->vars['max'] = $options['max'];
        if ($view->vars['max'] && $view->vars['min'] && $view->vars['max'] <= $view->vars['min']) {
            $view->vars['fixed_row'] = true;
        }
    }

    /**
     * Родительский виджет
     *
     * @return null|string|\Symfony\Component\Form\FormTypeInterface
     */
    public function getParent()
    {
        return TextType::class;
    }

    /**
     * Имя виджета
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}