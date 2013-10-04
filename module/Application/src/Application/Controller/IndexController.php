<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use PhlyMongo\PaginatorFactory;
use PhlyMongo\RangeRequest;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        error_reporting(E_ALL);
        ini_set('display_errors', 'on');


        $paginatorFactory = new PaginatorFactory();


        $currentId = $this->params("currentId");
        $page = $this->params("page");
        $step = $this->params("step");

        $rangeRequest = new RangeRequest($currentId, $page, $step);

        $paginator = $paginatorFactory->createPaginator($this->getServiceLocator()->get('My\MongoCollection'),$rangeRequest,10);


        return array(
            'paginator' => $paginator
        );
    }
}
