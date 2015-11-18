<?php

/**
 * Manage Elasticsearch
 *
 * @package     module-elasticsearch
 * @subpackage  Admin
 * @category    AdminController
 * @author      Nails Dev Team
 * @link
 */

namespace Nails\Admin\Elasticsearch;

use Nails\Factory;
use Nails\Admin\Helper;
use Nails\Admin\Controller\Base;

class Elasticsearch extends Base
{
    /**
     * Announces this controller's navGroups
     * @return stdClass
     */
    public static function announce()
    {
        if (userHasPermission('admin:elasticsearch:elasticsearch:browse')) {

            $navGroup = Factory::factory('Nav', 'nailsapp/module-admin');
            $navGroup->setLabel('Elasticsearch');
            $navGroup->setIcon('fa-search');
            $navGroup->addAction('Manage Elasticsearch');
            return $navGroup;
        }
    }

    // --------------------------------------------------------------------------

    /**
     * Returns an array of extra permissions for this controller
     * @return array
     */
    public static function permissions()
    {
        $permissions = parent::permissions();

        $permissions['browse']    = 'Can manage Elasticsearch';

        return $permissions;
    }

    // --------------------------------------------------------------------------

    /**
     * Manage elasticsearch
     * @return void
     */
    public function index()
    {
        if (!userHasPermission('admin:elasticsearch:elasticsearch:browse')) {

            unauthorised();
        }

        Helper::loadView('index');
    }
}
