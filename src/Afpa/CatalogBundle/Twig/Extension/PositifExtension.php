<?php

namespace Afpa\CatalogBundle\Twig\Extension;
 
class PositifExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'positif' => new \Twig_Filter_Method($this, 'auto_positive')
        );
    }
 
    public function auto_positive($value, $type = 'standard')
    {
        switch ($type) {
        	case 'fort':
        		$string = str_replace('.', ", c'est INCROYABE !", $value);
        		break;
        	
        	default:
        		$string = str_replace('.', ", c'est top !", $value);
        		break;
        }
        return $string;
    }
 
    public function getName()
    {
        return 'positif_extension';
    }
 
}