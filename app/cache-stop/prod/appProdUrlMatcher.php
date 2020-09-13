<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/gdr/avatar')) {
            // avatar-index
            if (preg_match('#^/gdr/avatar(?:/(?P<name>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-index')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\DefaultController::indexAction',  'name' => NULL,));
            }

            if (0 === strpos($pathinfo, '/gdr/avatar/inventory')) {
                // avatar-inventory
                if (preg_match('#^/gdr/avatar/inventory/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-inventory')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::indexAction',));
                }

                if (0 === strpos($pathinfo, '/gdr/avatar/inventory/item')) {
                    // avatar-inventory-items
                    if (0 === strpos($pathinfo, '/gdr/avatar/inventory/items') && preg_match('#^/gdr/avatar/inventory/items/(?P<name>[^/]++)/category/(?P<category>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-inventory-items')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::itemsAction',));
                    }

                    // avatar-inventory-item
                    if (preg_match('#^/gdr/avatar/inventory/item/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-inventory-item')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::showItemAction',));
                    }

                    if (0 === strpos($pathinfo, '/gdr/avatar/inventory/item/change-')) {
                        // avatar-inventory-change-visibility
                        if (0 === strpos($pathinfo, '/gdr/avatar/inventory/item/change-visibility') && preg_match('#^/gdr/avatar/inventory/item/change\\-visibility/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-inventory-change-visibility')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::changeVisibilityAction',));
                        }

                        // avatar-inventory-change-equipped
                        if (0 === strpos($pathinfo, '/gdr/avatar/inventory/item/change-equipped') && preg_match('#^/gdr/avatar/inventory/item/change\\-equipped/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-inventory-change-equipped')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::changeEquippedAction',));
                        }

                        // avatar-inventory-change-dressed
                        if (0 === strpos($pathinfo, '/gdr/avatar/inventory/item/change-dressed') && preg_match('#^/gdr/avatar/inventory/item/change\\-dressed/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-inventory-change-dressed')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::changeDressAction',));
                        }

                    }

                    // avatar-inventory-sell
                    if (0 === strpos($pathinfo, '/gdr/avatar/inventory/item/sell') && preg_match('#^/gdr/avatar/inventory/item/sell/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-inventory-sell')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::sellItemAction',));
                    }

                    // avatar-inventory-delete
                    if (0 === strpos($pathinfo, '/gdr/avatar/inventory/item/delete') && preg_match('#^/gdr/avatar/inventory/item/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-inventory-delete')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::deleteItemAction',));
                    }

                }

                // avatar-dress-list
                if (0 === strpos($pathinfo, '/gdr/avatar/inventory/dress') && preg_match('#^/gdr/avatar/inventory/dress(?:/(?P<name>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-dress-list')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::dressListAction',  'name' => NULL,));
                }

                if (0 === strpos($pathinfo, '/gdr/avatar/inventory/item')) {
                    // avatar-item-activate
                    if (0 === strpos($pathinfo, '/gdr/avatar/inventory/item/activate') && preg_match('#^/gdr/avatar/inventory/item/activate/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-item-activate')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::activateItemAction',));
                    }

                    // avatar-item-sacrify
                    if (0 === strpos($pathinfo, '/gdr/avatar/inventory/item/sacrify') && preg_match('#^/gdr/avatar/inventory/item/sacrify/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-item-sacrify')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::sacrifyItemAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/gdr/avatar/inventory/bag')) {
                    // avatar-bag-list
                    if (0 === strpos($pathinfo, '/gdr/avatar/inventory/bag/list') && preg_match('#^/gdr/avatar/inventory/bag/list(?:/(?P<name>[^/]++))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-bag-list')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::bagListAction',  'name' => NULL,));
                    }

                    // mini-bag
                    if ($pathinfo === '/gdr/avatar/inventory/bag/mini-bag') {
                        return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::miniBagAction',  '_route' => 'mini-bag',);
                    }

                }

                // avatar-item-send
                if (0 === strpos($pathinfo, '/gdr/avatar/inventory/item/send') && preg_match('#^/gdr/avatar/inventory/item/send/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-item-send')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\InventoryController::sendItemAction',));
                }

            }

            if (0 === strpos($pathinfo, '/gdr/avatar/diary')) {
                // avatar-diary-list
                if (0 === strpos($pathinfo, '/gdr/avatar/diary/index') && preg_match('#^/gdr/avatar/diary/index(?:/(?P<name>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-diary-list')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\DiaryController::indexAction',  'name' => NULL,));
                }

                // avatar-diary-show
                if (0 === strpos($pathinfo, '/gdr/avatar/diary/show') && preg_match('#^/gdr/avatar/diary/show/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-diary-show')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\DiaryController::showAction',));
                }

                // avatar-diary-create
                if ($pathinfo === '/gdr/avatar/diary/create') {
                    return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\DiaryController::createAction',  '_route' => 'avatar-diary-create',);
                }

                // avatar-diary-delete
                if (0 === strpos($pathinfo, '/gdr/avatar/diary/delete') && preg_match('#^/gdr/avatar/diary/delete/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-diary-delete')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\DiaryController::deleteAction',));
                }

                // avatar-diary-edit
                if (0 === strpos($pathinfo, '/gdr/avatar/diary/edit') && preg_match('#^/gdr/avatar/diary/edit/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-diary-edit')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\DiaryController::editAction',));
                }

            }

            if (0 === strpos($pathinfo, '/gdr/avatar/experience')) {
                // avatar-experience
                if (preg_match('#^/gdr/avatar/experience(?:/(?P<name>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-experience')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\ExperienceController::indexAction',  'name' => NULL,));
                }

                // avatar-experience-visibility
                if (0 === strpos($pathinfo, '/gdr/avatar/experience/visibility') && preg_match('#^/gdr/avatar/experience/visibility/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-experience-visibility')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\ExperienceController::changeVisibilityAction',));
                }

            }

            if (0 === strpos($pathinfo, '/gdr/avatar/management')) {
                // avatar-management
                if (rtrim($pathinfo, '/') === '/gdr/avatar/management') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'avatar-management');
                    }

                    return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\ManagementController::indexAction',  '_route' => 'avatar-management',);
                }

                if (0 === strpos($pathinfo, '/gdr/avatar/management/form')) {
                    // avatar-management-form-common
                    if ($pathinfo === '/gdr/avatar/management/form/common') {
                        return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\ManagementController::formCommonAction',  '_route' => 'avatar-management-form-common',);
                    }

                    // avatar-management-form-user
                    if ($pathinfo === '/gdr/avatar/management/form/user') {
                        return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\ManagementController::formUserAction',  '_route' => 'avatar-management-form-user',);
                    }

                }

                // avatar-management-kill
                if (0 === strpos($pathinfo, '/gdr/avatar/management/kill-me') && preg_match('#^/gdr/avatar/management/kill\\-me(?:/(?P<suicide>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-management-kill')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\ManagementController::killAction',  'suicide' => false,));
                }

            }

            if (0 === strpos($pathinfo, '/gdr/avatar/grimory')) {
                // grimory-index
                if (rtrim($pathinfo, '/') === '/gdr/avatar/grimory') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'grimory-index');
                    }

                    return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\GrimoryController::indexAction',  '_route' => 'grimory-index',);
                }

                // grimory-show-spell
                if (0 === strpos($pathinfo, '/gdr/avatar/grimory/spell/show') && preg_match('#^/gdr/avatar/grimory/spell/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'grimory-show-spell')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\GrimoryController::showSpellAction',));
                }

                // grimory-total-spells
                if (0 === strpos($pathinfo, '/gdr/avatar/grimory/total-spells') && preg_match('#^/gdr/avatar/grimory/total\\-spells/(?P<level>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'grimory-total-spells')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\GrimoryController::totalSpellsLearnedAction',));
                }

                if (0 === strpos($pathinfo, '/gdr/avatar/grimory/spell')) {
                    if (0 === strpos($pathinfo, '/gdr/avatar/grimory/spells')) {
                        // grimory-categories
                        if (0 === strpos($pathinfo, '/gdr/avatar/grimory/spells/categories/level') && preg_match('#^/gdr/avatar/grimory/spells/categories/level/(?P<level>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'grimory-categories')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\GrimoryController::categorySpellsAction',));
                        }

                        // grimory-spells
                        if (0 === strpos($pathinfo, '/gdr/avatar/grimory/spells/list') && preg_match('#^/gdr/avatar/grimory/spells/list/(?P<categoryId>[^/]++)/level/(?P<level>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'grimory-spells')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\GrimoryController::spellsAction',));
                        }

                    }

                    // grimory-select
                    if (0 === strpos($pathinfo, '/gdr/avatar/grimory/spell/select') && preg_match('#^/gdr/avatar/grimory/spell/select/(?P<spellId>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'grimory-select')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\GrimoryController::selectSpellAction',));
                    }

                    // grimory-study
                    if ($pathinfo === '/gdr/avatar/grimory/spells/study') {
                        return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\GrimoryController::studySpellsAction',  '_route' => 'grimory-study',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/gdr/avatar/skill')) {
                // skill-index
                if ($pathinfo === '/gdr/avatar/skill/index') {
                    return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\SkillController::indexAction',  '_route' => 'skill-index',);
                }

                if (0 === strpos($pathinfo, '/gdr/avatar/skill/learn')) {
                    // skill-learn
                    if (preg_match('#^/gdr/avatar/skill/learn/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'skill-learn')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\SkillController::learnSkillAction',));
                    }

                    // skill-random-learn
                    if ($pathinfo === '/gdr/avatar/skill/learn-random-skill') {
                        return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\SkillController::learnRandomSkillAction',  '_route' => 'skill-random-learn',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/gdr/avatar/property')) {
                // property-index
                if (0 === strpos($pathinfo, '/gdr/avatar/property/index') && preg_match('#^/gdr/avatar/property/index(?:/(?P<name>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'property-index')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\PropertyController::indexAction',  'name' => NULL,));
                }

                // property-address
                if (0 === strpos($pathinfo, '/gdr/avatar/property/address') && preg_match('#^/gdr/avatar/property/address/(?P<key>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'property-address')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\PropertyController::setAddressAction',));
                }

                // property-sell
                if (0 === strpos($pathinfo, '/gdr/avatar/property/sell') && preg_match('#^/gdr/avatar/property/sell/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'property-sell')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\PropertyController::sellAction',));
                }

                // property-items
                if (0 === strpos($pathinfo, '/gdr/avatar/property/items') && preg_match('#^/gdr/avatar/property/items/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'property-items')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\PropertyController::showProductsAction',));
                }

                // property-products
                if (0 === strpos($pathinfo, '/gdr/avatar/property/sell') && preg_match('#^/gdr/avatar/property/sell/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'property-products')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\PropertyController::sellAction',));
                }

                // property-create-keys
                if (0 === strpos($pathinfo, '/gdr/avatar/property/create/keys') && preg_match('#^/gdr/avatar/property/create/keys/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'property-create-keys')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\PropertyController::createKeysAction',));
                }

                // property-show-keys
                if (0 === strpos($pathinfo, '/gdr/avatar/property/show/keys') && preg_match('#^/gdr/avatar/property/show/keys/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'property-show-keys')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\PropertyController::showKeysAction',));
                }

                // property-remove-key
                if (0 === strpos($pathinfo, '/gdr/avatar/property/remove/key') && preg_match('#^/gdr/avatar/property/remove/key/(?P<inventoryId>[^/]++)/(?P<propertyId>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'property-remove-key')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\PropertyController::removeKeyAction',));
                }

            }

            if (0 === strpos($pathinfo, '/gdr/avatar/ma')) {
                if (0 === strpos($pathinfo, '/gdr/avatar/master')) {
                    // master-enclave-index
                    if ($pathinfo === '/gdr/avatar/master/enclave-index') {
                        return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\EnclaveMasterController::indexEnclaveAction',  '_route' => 'master-enclave-index',);
                    }

                    // master-clan-index
                    if ($pathinfo === '/gdr/avatar/master/clan-index') {
                        return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\EnclaveMasterController::indexClanAction',  '_route' => 'master-clan-index',);
                    }

                    if (0 === strpos($pathinfo, '/gdr/avatar/master/enclave-modifica-')) {
                        // master-enclave-edit-member
                        if (0 === strpos($pathinfo, '/gdr/avatar/master/enclave-modifica-membro') && preg_match('#^/gdr/avatar/master/enclave\\-modifica\\-membro\\-(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'master-enclave-edit-member')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\EnclaveMasterController::editMemberEnclaveAction',));
                        }

                        // master-enclave-edit-level
                        if (0 === strpos($pathinfo, '/gdr/avatar/master/enclave-modifica-livello') && preg_match('#^/gdr/avatar/master/enclave\\-modifica\\-livello\\-(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'master-enclave-edit-level')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\EnclaveMasterController::editMemberLevelEnclaveAction',));
                        }

                    }

                    // master-clan-edit-member
                    if (0 === strpos($pathinfo, '/gdr/avatar/master/clan-modifica-membro') && preg_match('#^/gdr/avatar/master/clan\\-modifica\\-membro\\-(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'master-clan-edit-member')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\EnclaveMasterController::editMemberClanAction',));
                    }

                    // master-enclave-delete-member
                    if (0 === strpos($pathinfo, '/gdr/avatar/master/enclave-elimina-membro') && preg_match('#^/gdr/avatar/master/enclave\\-elimina\\-membro\\-(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'master-enclave-delete-member')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\EnclaveMasterController::deleteMemberEnclaveAction',));
                    }

                    // master-clan-delete-member
                    if (0 === strpos($pathinfo, '/gdr/avatar/master/clan-elimina-membro') && preg_match('#^/gdr/avatar/master/clan\\-elimina\\-membro\\-(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'master-clan-delete-member')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\EnclaveMasterController::deleteMemberClanAction',));
                    }

                    // master-enclave-new
                    if ($pathinfo === '/gdr/avatar/master/enclave-aggiungi-membro') {
                        return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\EnclaveMasterController::addMemberEnclaveAction',  '_route' => 'master-enclave-new',);
                    }

                    // master-clan-new
                    if ($pathinfo === '/gdr/avatar/master/clan-aggiungi-membro') {
                        return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\EnclaveMasterController::addMemberClanAction',  '_route' => 'master-clan-new',);
                    }

                    if (0 === strpos($pathinfo, '/gdr/avatar/master/gestione-forum-')) {
                        // master-forum-enclave-admin
                        if ($pathinfo === '/gdr/avatar/master/gestione-forum-enclave') {
                            return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\EnclaveMasterController::manageForumEnclaveAction',  '_route' => 'master-forum-enclave-admin',);
                        }

                        // master-forum-clan-admin
                        if ($pathinfo === '/gdr/avatar/master/gestione-forum-clan') {
                            return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\EnclaveMasterController::manageForumClanAction',  '_route' => 'master-forum-clan-admin',);
                        }

                        // master-forum-enclave-edit-category
                        if (0 === strpos($pathinfo, '/gdr/avatar/master/gestione-forum-enclave/modifica') && preg_match('#^/gdr/avatar/master/gestione\\-forum\\-enclave/modifica\\-(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'master-forum-enclave-edit-category')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\EnclaveMasterController::editForumEnclaveCategoryAction',));
                        }

                        // master-forum-clan-edit-category
                        if (0 === strpos($pathinfo, '/gdr/avatar/master/gestione-forum-clan/modifica') && preg_match('#^/gdr/avatar/master/gestione\\-forum\\-clan/modifica\\-(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'master-forum-clan-edit-category')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\EnclaveMasterController::editForumClanCategoryAction',));
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/gdr/avatar/matrimoni')) {
                    // matrimoni-index
                    if (rtrim($pathinfo, '/') === '/gdr/avatar/matrimoni') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'matrimoni-index');
                        }

                        return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\WeddingController::IndexAction',  '_route' => 'matrimoni-index',);
                    }

                    // matrimoni-divorzia
                    if (0 === strpos($pathinfo, '/gdr/avatar/matrimoni/divorzia') && preg_match('#^/gdr/avatar/matrimoni/divorzia\\-(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'matrimoni-divorzia')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\WeddingController::DivorceAction',));
                    }

                }

            }

            // fato-index
            if (rtrim($pathinfo, '/') === '/gdr/avatar/fato') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fato-index');
                }

                return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\FateController::IndexAction',  '_route' => 'fato-index',);
            }

            if (0 === strpos($pathinfo, '/gdr/avatar/mod')) {
                // mod-esilio
                if (rtrim($pathinfo, '/') === '/gdr/avatar/mod') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'mod-esilio');
                    }

                    return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\ModController::esilioAction',  '_route' => 'mod-esilio',);
                }

                if (0 === strpos($pathinfo, '/gdr/avatar/mod/personages')) {
                    // mod-last-registered
                    if ($pathinfo === '/gdr/avatar/mod/personages/last-registered') {
                        return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\ModController::showLastRegisteredAction',  '_route' => 'mod-last-registered',);
                    }

                    // mod-same-ips
                    if ($pathinfo === '/gdr/avatar/mod/personages/same-ips') {
                        return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\ModController::sameIpsAction',  '_route' => 'mod-same-ips',);
                    }

                }

            }

            // avatar-achivement-index
            if (0 === strpos($pathinfo, '/gdr/avatar/riconoscimenti') && preg_match('#^/gdr/avatar/riconoscimenti(?:/(?P<name>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'avatar-achivement-index')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\AchievementController::indexAction',  'name' => NULL,));
            }

            if (0 === strpos($pathinfo, '/gdr/avatar/combattimento')) {
                // combat-index
                if ($pathinfo === '/gdr/avatar/combattimento/index') {
                    return array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\CombatController::indexAction',  '_route' => 'combat-index',);
                }

                // combat-up
                if (0 === strpos($pathinfo, '/gdr/avatar/combattimento/up') && preg_match('#^/gdr/avatar/combattimento/up/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'combat-up')), array (  '_controller' => 'Gdr\\AvatarBundle\\Controller\\CombatController::levelUpAction',));
                }

            }

        }

        if (0 === strpos($pathinfo, '/hello')) {
            // items_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'items_homepage')), array (  '_controller' => 'Gdr\\ItemsBundle\\Controller\\DefaultController::indexAction',));
            }

            // race_homepage
            if (preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'race_homepage')), array (  '_controller' => 'RaceBundle:Default:index',));
            }

        }

        if (0 === strpos($pathinfo, '/gdr')) {
            // game_homepage
            if (rtrim($pathinfo, '/') === '/gdr') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'game_homepage');
                }

                return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\DefaultController::indexAction',  '_route' => 'game_homepage',);
            }

            if (0 === strpos($pathinfo, '/gdr/location')) {
                // change_location
                if (0 === strpos($pathinfo, '/gdr/location/posizione') && preg_match('#^/gdr/location/posizione/(?P<id>[^/]++)(?:/(?P<ajax>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'change_location')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LocationController::changeAction',  'ajax' => 0,));
                }

                // location_map
                if ($pathinfo === '/gdr/location/mappa') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LocationController::mapAction',  '_route' => 'location_map',);
                }

                // location-info
                if ($pathinfo === '/gdr/location/informazioni') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LocationController::renderLocationInfosAction',  '_route' => 'location-info',);
                }

                // location-map-description
                if ($pathinfo === '/gdr/location/descrizione-cartografia') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LocationController::renderDescriptionMapAction',  '_route' => 'location-map-description',);
                }

                // locations_map
                if (0 === strpos($pathinfo, '/gdr/location/mappa-locations') && preg_match('#^/gdr/location/mappa\\-locations/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'locations_map')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LocationController::showMapAndLocationsAction',));
                }

                // toggle-audio
                if (0 === strpos($pathinfo, '/gdr/location/impostazioni/audio') && preg_match('#^/gdr/location/impostazioni/audio(?:/(?P<change>[^/]++))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'toggle-audio')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\DefaultController::renderAudioAction',  'change' => 0,));
                }

            }

            if (0 === strpos($pathinfo, '/gdr/chat')) {
                // chat-index
                if ($pathinfo === '/gdr/chat/index') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::indexAction',  'wantPlay' => false,  '_route' => 'chat-index',);
                }

                // chat-output
                if ($pathinfo === '/gdr/chat/output') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::getAjaxChatsAction',  '_route' => 'chat-output',);
                }

                // chat-input
                if ($pathinfo === '/gdr/chat/input') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::inputAction',  '_route' => 'chat-input',);
                }

                // chat-join
                if ($pathinfo === '/gdr/chat/join') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::joinAction',  '_route' => 'chat-join',);
                }

                // chat-leave
                if ($pathinfo === '/gdr/chat/leave') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::leaveAction',  '_route' => 'chat-leave',);
                }

                if (0 === strpos($pathinfo, '/gdr/chat/infos')) {
                    // chat-pg-infos
                    if (0 === strpos($pathinfo, '/gdr/chat/infos/personage') && preg_match('#^/gdr/chat/infos/personage/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat-pg-infos')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::pgInfosAction',));
                    }

                    // chat-pg-dress
                    if (0 === strpos($pathinfo, '/gdr/chat/infos/dress') && preg_match('#^/gdr/chat/infos/dress/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat-pg-dress')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::pgDressAction',));
                    }

                    // chat-pg-items
                    if (0 === strpos($pathinfo, '/gdr/chat/infos/items') && preg_match('#^/gdr/chat/infos/items/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat-pg-items')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::pgItemsAction',));
                    }

                }

                // chat-show-online
                if ($pathinfo === '/gdr/chat/online') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::onlineListAction',  '_route' => 'chat-show-online',);
                }

                if (0 === strpos($pathinfo, '/gdr/chat/passa')) {
                    // chat-passa-mori
                    if (0 === strpos($pathinfo, '/gdr/chat/passaMori') && preg_match('#^/gdr/chat/passaMori(?:/(?P<formSended>[^/]++))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat-passa-mori')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::passaMoriAction',  'formSended' => false,));
                    }

                    // chat-passa-oggetti
                    if (0 === strpos($pathinfo, '/gdr/chat/passaOggetti') && preg_match('#^/gdr/chat/passaOggetti(?:/(?P<formSended>[^/]++))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat-passa-oggetti')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::passaOggettiAction',  'formSended' => false,));
                    }

                }

                // chat-roll-dice
                if (rtrim($pathinfo, '/') === '/gdr/chat/roll-dice') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'chat-roll-dice');
                    }

                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::rollDiceAction',  '_route' => 'chat-roll-dice',);
                }

                if (0 === strpos($pathinfo, '/gdr/chat/save')) {
                    // chat-save
                    if ($pathinfo === '/gdr/chat/save/download') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::downloadAction',  '_route' => 'chat-save',);
                    }

                    // chat-save-show-form
                    if ($pathinfo === '/gdr/chat/save/form') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::downloadFormAction',  '_route' => 'chat-save-show-form',);
                    }

                }

                // chat-bag
                if (0 === strpos($pathinfo, '/gdr/chat/bag/show') && preg_match('#^/gdr/chat/bag/show/(?P<id>[^/]++)/(?P<type>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat-bag')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::bagAction',));
                }

                if (0 === strpos($pathinfo, '/gdr/chat/s')) {
                    if (0 === strpos($pathinfo, '/gdr/chat/skill')) {
                        // chat-skill-show
                        if ($pathinfo === '/gdr/chat/skill/show') {
                            return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::showSkillAction',  '_route' => 'chat-skill-show',);
                        }

                        // chat-skill-use
                        if (0 === strpos($pathinfo, '/gdr/chat/skill/use') && preg_match('#^/gdr/chat/skill/use/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat-skill-use')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::useSkillAction',));
                        }

                    }

                    // chat-mod
                    if ($pathinfo === '/gdr/chat/segnala-moderazione') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::callModAction',  '_route' => 'chat-mod',);
                    }

                }

                // chat-show-item
                if (0 === strpos($pathinfo, '/gdr/chat/mostra-oggetto') && preg_match('#^/gdr/chat/mostra\\-oggetto/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'chat-show-item')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ChatController::showItemAction',));
                }

            }

            // location
            if ($pathinfo === '/gdr/newloc') {
                return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\DefaultController::locationAction',  '_route' => 'location',);
            }

            if (0 === strpos($pathinfo, '/gdr/m')) {
                if (0 === strpos($pathinfo, '/gdr/missive')) {
                    // missive-index
                    if (0 === strpos($pathinfo, '/gdr/missive/index') && preg_match('#^/gdr/missive/index(?:/(?P<ajax>[^/]++))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'missive-index')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LetterController::indexAction',  'ajax' => false,));
                    }

                    // missive-show
                    if (0 === strpos($pathinfo, '/gdr/missive/show') && preg_match('#^/gdr/missive/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'missive-show')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LetterController::showAction',));
                    }

                    // missive-create
                    if (0 === strpos($pathinfo, '/gdr/missive/create') && preg_match('#^/gdr/missive/create(?:/(?P<isForGroup>[^/]++)(?:/(?P<destinatario>[^/]++)(?:/(?P<threadId>[^/]++))?)?)?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'missive-create')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LetterController::createAction',  'isForGroup' => false,  'destinatario' => false,  'threadId' => false,));
                    }

                    // missive-reply
                    if (0 === strpos($pathinfo, '/gdr/missive/reply') && preg_match('#^/gdr/missive/reply/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'missive-reply')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LetterController::replyAction',));
                    }

                    // missive-inoltra
                    if (0 === strpos($pathinfo, '/gdr/missive/inoltra') && preg_match('#^/gdr/missive/inoltra/(?P<id>[^/]++)(?:/(?P<isForGroup>[^/]++))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'missive-inoltra')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LetterController::inoltraAction',  'isForGroup' => false,));
                    }

                    // missive-delete
                    if ($pathinfo === '/gdr/missive/delete') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LetterController::deleteAction',  '_route' => 'missive-delete',);
                    }

                    // missive-single-delete
                    if (0 === strpos($pathinfo, '/gdr/missive/single-delete') && preg_match('#^/gdr/missive/single\\-delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'missive-single-delete')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LetterController::deleteSingleAction',));
                    }

                    // missive-convert
                    if (0 === strpos($pathinfo, '/gdr/missive/converti') && preg_match('#^/gdr/missive/converti/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'missive-convert')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LetterController::convertToItemAction',));
                    }

                    // missive-ajax
                    if ($pathinfo === '/gdr/missive/ajax') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LetterController::showLetterAjaxAction',  '_route' => 'missive-ajax',);
                    }

                }

                if (0 === strpos($pathinfo, '/gdr/mercato')) {
                    // market
                    if (rtrim($pathinfo, '/') === '/gdr/mercato') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'market');
                        }

                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\MarketController::indexAction',  '_route' => 'market',);
                    }

                    // market-items
                    if (0 === strpos($pathinfo, '/gdr/mercato/lista/mercato') && preg_match('#^/gdr/mercato/lista/mercato/(?P<mercato>1|2|3|4|5)/livello/(?P<livello>0|1|2|3|4|5)/categoria(?:/(?P<categoria>\\d+))?$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'market-items')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\MarketController::listItemsAction',  'mercato' => 1,  'livello' => 0,  'categoria' => NULL,));
                    }

                    // market-buy
                    if (0 === strpos($pathinfo, '/gdr/mercato/acquisto') && preg_match('#^/gdr/mercato/acquisto/(?P<itemId>\\d+)/(?P<quantity>\\d+)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_marketbuy;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'market-buy')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\MarketController::buyItemsAction',));
                    }
                    not_marketbuy:

                    // market-test
                    if (rtrim($pathinfo, '/') === '/gdr/mercato/test') {
                        if (substr($pathinfo, -1) !== '/') {
                            return $this->redirect($pathinfo.'/', 'market-test');
                        }

                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\MarketController::testAction',  '_route' => 'market-test',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/gdr/bank')) {
                // bank-index
                if ($pathinfo === '/gdr/bank/index') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\Location\\BankController::indexAction',  '_route' => 'bank-index',);
                }

                // bank-prelievo
                if (0 === strpos($pathinfo, '/gdr/bank/prelievo') && preg_match('#^/gdr/bank/prelievo/(?P<quantity>\\d+)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bank-prelievo')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\Location\\BankController::prelievoAction',));
                }

                // bank-trasferimento
                if ($pathinfo === '/gdr/bank/trasferimento') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\Location\\BankController::trasferimentoAction',  '_route' => 'bank-trasferimento',);
                }

                // bank-deposito
                if ($pathinfo === '/gdr/bank/deposito') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\Location\\BankController::depositoAction',  '_route' => 'bank-deposito',);
                }

                // bank-clean-oldest
                if ($pathinfo === '/gdr/bank/oldest') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\Location\\BankController::cleanOldestAction',  '_route' => 'bank-clean-oldest',);
                }

            }

            if (0 === strpos($pathinfo, '/gdr/enclave')) {
                // enclave-index
                if ($pathinfo === '/gdr/enclave/index') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\EnclaveController::indexAction',  '_route' => 'enclave-index',);
                }

                if (0 === strpos($pathinfo, '/gdr/enclave/s')) {
                    // enclave-show
                    if (0 === strpos($pathinfo, '/gdr/enclave/show') && preg_match('#^/gdr/enclave/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'enclave-show')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\EnclaveController::showAction',));
                    }

                    // enclave-statute
                    if (0 === strpos($pathinfo, '/gdr/enclave/statute') && preg_match('#^/gdr/enclave/statute/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'enclave-statute')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\EnclaveController::showStatuteAction',));
                    }

                }

                // enclave-annex
                if (0 === strpos($pathinfo, '/gdr/enclave/annex') && preg_match('#^/gdr/enclave/annex/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'enclave-annex')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\EnclaveController::showAnnexAction',));
                }

                // enclave-nobili
                if ($pathinfo === '/gdr/enclave/nobili') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\EnclaveController::showNobiliAction',  '_route' => 'enclave-nobili',);
                }

            }

            if (0 === strpos($pathinfo, '/gdr/presenti')) {
                // online-index
                if ($pathinfo === '/gdr/presenti/index') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\OnlineController::indexAction',  '_route' => 'online-index',);
                }

                // refresh-user
                if ($pathinfo === '/gdr/presenti/refresh-user') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\OnlineController::refreshUserAction',  '_route' => 'refresh-user',);
                }

                // logged-in-out
                if ($pathinfo === '/gdr/presenti/show-in-and-out') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\OnlineController::showLoggedInOutAction',  '_route' => 'logged-in-out',);
                }

            }

            if (0 === strpos($pathinfo, '/gdr/bacheca')) {
                // bacheca-index
                if ($pathinfo === '/gdr/bacheca/index') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ForumController::indexAction',  '_route' => 'bacheca-index',);
                }

                // bacheca-lista-forum
                if (0 === strpos($pathinfo, '/gdr/bacheca/forum/lista-enclave') && preg_match('#^/gdr/bacheca/forum/lista\\-enclave/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bacheca-lista-forum')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ForumController::showPrivateForumsAction',));
                }

                if (0 === strpos($pathinfo, '/gdr/bacheca/thread')) {
                    // bacheca-lista-threads
                    if (0 === strpos($pathinfo, '/gdr/bacheca/threads/categoria') && preg_match('#^/gdr/bacheca/threads/categoria/(?P<category>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bacheca-lista-threads')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ForumController::showThreadsAction',));
                    }

                    // bacheca-create-thread
                    if (0 === strpos($pathinfo, '/gdr/bacheca/thread/new') && preg_match('#^/gdr/bacheca/thread/new/(?P<category>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bacheca-create-thread')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ForumController::createThreadAction',));
                    }

                    // bacheca-show-thread
                    if (0 === strpos($pathinfo, '/gdr/bacheca/thread/show') && preg_match('#^/gdr/bacheca/thread/show/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bacheca-show-thread')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ForumController::showThreadAction',));
                    }

                    // bacheca-close-thread
                    if (0 === strpos($pathinfo, '/gdr/bacheca/thread/close') && preg_match('#^/gdr/bacheca/thread/close/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bacheca-close-thread')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ForumController::closeThreadAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/gdr/bacheca/post')) {
                    // bacheca-create-post
                    if (0 === strpos($pathinfo, '/gdr/bacheca/post/create') && preg_match('#^/gdr/bacheca/post/create/(?P<thread>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bacheca-create-post')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ForumController::createPostAction',));
                    }

                    // bacheca-delete-post
                    if (0 === strpos($pathinfo, '/gdr/bacheca/post/delete') && preg_match('#^/gdr/bacheca/post/delete/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bacheca-delete-post')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ForumController::deletePostAction',));
                    }

                    // bacheca-edit-post
                    if (0 === strpos($pathinfo, '/gdr/bacheca/post/edit') && preg_match('#^/gdr/bacheca/post/edit/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bacheca-edit-post')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ForumController::editPostAction',));
                    }

                }

                // bacheca-special
                if (0 === strpos($pathinfo, '/gdr/bacheca/special') && preg_match('#^/gdr/bacheca/special/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bacheca-special')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ForumController::showSpecialForumAction',));
                }

                // bacheca-helpdesk
                if (0 === strpos($pathinfo, '/gdr/bacheca/helpdesk') && preg_match('#^/gdr/bacheca/helpdesk/(?P<type>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'bacheca-helpdesk')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ForumController::helpDeskAction',));
                }

                if (0 === strpos($pathinfo, '/gdr/bacheca/thread')) {
                    // bacheca-set-readed
                    if (0 === strpos($pathinfo, '/gdr/bacheca/thread/all-readed') && preg_match('#^/gdr/bacheca/thread/all\\-readed/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bacheca-set-readed')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ForumController::setThreadsReadedAction',));
                    }

                    // bacheca-follow
                    if (0 === strpos($pathinfo, '/gdr/bacheca/thread/follow') && preg_match('#^/gdr/bacheca/thread/follow/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'bacheca-follow')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ForumController::followAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/gdr/erario')) {
                // erario-index
                if (0 === strpos($pathinfo, '/gdr/erario/index') && preg_match('#^/gdr/erario/index/(?P<type>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'erario-index')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ErarioController::indexAction',));
                }

                // erario-buy
                if (0 === strpos($pathinfo, '/gdr/erario/buy') && preg_match('#^/gdr/erario/buy/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'erario-buy')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ErarioController::buyAction',));
                }

            }

            if (0 === strpos($pathinfo, '/gdr/lavoro')) {
                // lavoro-index
                if ($pathinfo === '/gdr/lavoro/lista') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\WorkController::indexAction',  '_route' => 'lavoro-index',);
                }

                // lavoro-scegli
                if (0 === strpos($pathinfo, '/gdr/lavoro/scegli') && preg_match('#^/gdr/lavoro/scegli/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'lavoro-scegli')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\WorkController::workAction',));
                }

            }

            // editti-index
            if ($pathinfo === '/gdr/editti/visualizza') {
                return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\EdittiController::showAction',  '_route' => 'editti-index',);
            }

            if (0 === strpos($pathinfo, '/gdr/biblioteca/sezion')) {
                // biblioteca-index
                if ($pathinfo === '/gdr/biblioteca/sezioni') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LibraryController::indexAction',  '_route' => 'biblioteca-index',);
                }

                if (0 === strpos($pathinfo, '/gdr/biblioteca/sezione')) {
                    // biblioteca-show
                    if (preg_match('#^/gdr/biblioteca/sezione/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'biblioteca-show')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LibraryController::showAction',));
                    }

                    // biblioteca-show-book
                    if (0 === strpos($pathinfo, '/gdr/biblioteca/sezione/libro') && preg_match('#^/gdr/biblioteca/sezione/libro/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'biblioteca-show-book')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\LibraryController::showBookAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/gdr/m')) {
                if (0 === strpos($pathinfo, '/gdr/manuale')) {
                    // manuale-index
                    if ($pathinfo === '/gdr/manuale/lista') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ManualeController::indexAction',  '_route' => 'manuale-index',);
                    }

                    // manuale-show
                    if (0 === strpos($pathinfo, '/gdr/manuale/visualizza') && preg_match('#^/gdr/manuale/visualizza\\-(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'manuale-show')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ManualeController::showAction',));
                    }

                }

                if (0 === strpos($pathinfo, '/gdr/meteo')) {
                    // meteo-show
                    if ($pathinfo === '/gdr/meteo/show') {
                        return array (  '_controller' => 'Gdr\\MeteoBundle\\Controller\\DefaultController::renderConditionAction',  '_route' => 'meteo-show',);
                    }

                    // date-show
                    if ($pathinfo === '/gdr/meteo/date') {
                        return array (  '_controller' => 'Gdr\\MeteoBundle\\Controller\\DefaultController::renderDateAction',  '_route' => 'date-show',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/gdr/a')) {
                if (0 === strpos($pathinfo, '/gdr/anagrafe')) {
                    // anagrafe-index
                    if ($pathinfo === '/gdr/anagrafe/index') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\AnagrafeController::indexAction',  '_route' => 'anagrafe-index',);
                    }

                    // anagrafe-divorzi
                    if ($pathinfo === '/gdr/anagrafe/divorzi') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\AnagrafeController::divorcesAction',  '_route' => 'anagrafe-divorzi',);
                    }

                    // anagrafe-matrimoni
                    if ($pathinfo === '/gdr/anagrafe/matrimoni') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\AnagrafeController::weddingAction',  '_route' => 'anagrafe-matrimoni',);
                    }

                }

                if (0 === strpos($pathinfo, '/gdr/admin')) {
                    // g-admin-items
                    if ($pathinfo === '/gdr/admin/inventario-oggetti') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\AdminController::assignItemAction',  '_route' => 'g-admin-items',);
                    }

                    // g-show-locations
                    if ($pathinfo === '/gdr/admin/mostra-locations') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\AdminController::chooseLocationAction',  '_route' => 'g-show-locations',);
                    }

                    if (0 === strpos($pathinfo, '/gdr/admin/s')) {
                        // g-select-location
                        if (0 === strpos($pathinfo, '/gdr/admin/scegli-location') && preg_match('#^/gdr/admin/scegli\\-location/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'g-select-location')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\AdminController::showLocationAction',));
                        }

                        // g-save-location
                        if (0 === strpos($pathinfo, '/gdr/admin/salva-location') && preg_match('#^/gdr/admin/salva\\-location/(?P<id>[^/]++)/(?P<top>[^/]++)/(?P<left>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'g-save-location')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\AdminController::savePositionAction',));
                        }

                    }

                    if (0 === strpos($pathinfo, '/gdr/admin/modifica-personaggio')) {
                        // g-edit-pg
                        if ($pathinfo === '/gdr/admin/modifica-personaggio') {
                            return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\AdminController::editPersonageAction',  'step' => 1,  '_route' => 'g-edit-pg',);
                        }

                        // g-edit-pg-step
                        if ($pathinfo === '/gdr/admin/modifica-personaggio-2') {
                            return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\AdminController::editPersonageAction',  'step' => 2,  '_route' => 'g-edit-pg-step',);
                        }

                    }

                    // g-shop-list
                    if ($pathinfo === '/gdr/admin/lista-botteghe') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\AdminController::shopListAction',  '_route' => 'g-shop-list',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/gdr/cimitero')) {
                // cimitero-index
                if ($pathinfo === '/gdr/cimitero/index') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\GraveController::indexAction',  '_route' => 'cimitero-index',);
                }

                if (0 === strpos($pathinfo, '/gdr/cimitero/tombe')) {
                    // cimitero-singole
                    if ($pathinfo === '/gdr/cimitero/tombe') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\GraveController::showAction',  '_route' => 'cimitero-singole',);
                    }

                    // cimitero-famiglia
                    if ($pathinfo === '/gdr/cimitero/tombe-di-famiglia') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\GraveController::showFamilyAction',  '_route' => 'cimitero-famiglia',);
                    }

                }

            }

            if (0 === strpos($pathinfo, '/gdr/m')) {
                // marque-show
                if ($pathinfo === '/gdr/marque/show') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\MarqueController::getMarquesAction',  '_route' => 'marque-show',);
                }

                if (0 === strpos($pathinfo, '/gdr/museo/sezion')) {
                    // museo-index
                    if ($pathinfo === '/gdr/museo/sezioni') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\MuseoController::indexAction',  '_route' => 'museo-index',);
                    }

                    if (0 === strpos($pathinfo, '/gdr/museo/sezione')) {
                        // museo-show
                        if (preg_match('#^/gdr/museo/sezione/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'museo-show')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\MuseoController::showAction',));
                        }

                        // museo-show-book
                        if (0 === strpos($pathinfo, '/gdr/museo/sezione/manufatto') && preg_match('#^/gdr/museo/sezione/manufatto/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'museo-show-book')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\MuseoController::showBookAction',));
                        }

                    }

                }

            }

            if (0 === strpos($pathinfo, '/gdr/archivio/sezion')) {
                // archivio-index
                if ($pathinfo === '/gdr/archivio/sezioni') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ArchivioController::indexAction',  '_route' => 'archivio-index',);
                }

                if (0 === strpos($pathinfo, '/gdr/archivio/sezione')) {
                    // archivio-show
                    if (preg_match('#^/gdr/archivio/sezione/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'archivio-show')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ArchivioController::showAction',));
                    }

                    // archivio-show-book
                    if (0 === strpos($pathinfo, '/gdr/archivio/sezione/documento') && preg_match('#^/gdr/archivio/sezione/documento/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'archivio-show-book')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\ArchivioController::showBookAction',));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/gdr/saggio-di-teon')) {
                // wise.index
                if (rtrim($pathinfo, '/') === '/gdr/saggio-di-teon') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'wise.index');
                    }

                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\Location\\WiseController::indexAction',  '_route' => 'wise.index',);
                }

                // wise.ask
                if ($pathinfo === '/gdr/saggio-di-teon/chiedi') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\Location\\WiseController::askAction',  '_route' => 'wise.ask',);
                }

            }

        }

        // login
        if (0 === strpos($pathinfo, '/login') && preg_match('#^/login(?:/(?P<isIncluded>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'login')), array (  '_controller' => 'Gdr\\UserBundle\\Controller\\LoginController::loginAction',  'isIncluded' => 0,));
        }

        // login_beta
        if (0 === strpos($pathinfo, '/beta/login') && preg_match('#^/beta/login(?:/(?P<isIncluded>[^/]++))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'login_beta')), array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => 'login',  'permanent' => true,  'isIncluded' => 0,));
        }

        if (0 === strpos($pathinfo, '/log')) {
            // logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'Gdr\\UserBundle\\Controller\\LoginController::logoutAction',  '_route' => 'logout',);
            }

            // login_check
            if ($pathinfo === '/login_check') {
                return array('_route' => 'login_check');
            }

        }

        if (0 === strpos($pathinfo, '/registra')) {
            // user_register
            if ($pathinfo === '/registrati.html') {
                return array (  '_controller' => 'Gdr\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'user_register',);
            }

            // user_post_register
            if ($pathinfo === '/registrazione-completata.html') {
                return array (  '_controller' => 'Gdr\\UserBundle\\Controller\\RegistrationController::postRegisterAction',  '_route' => 'user_post_register',);
            }

        }

        if (0 === strpos($pathinfo, '/utente')) {
            if (0 === strpos($pathinfo, '/utente/crea-nuovo-personaggio')) {
                // user_new_pg
                if ($pathinfo === '/utente/crea-nuovo-personaggio.html') {
                    return array (  '_controller' => 'Gdr\\UserBundle\\Controller\\LoginController::newPersonageAction',  '_route' => 'user_new_pg',);
                }

                // user_new_pg_step
                if ($pathinfo === '/utente/crea-nuovo-personaggio-passo-2.html') {
                    return array (  '_controller' => 'Gdr\\UserBundle\\Controller\\LoginController::newPersonageAction',  'step' => 2,  '_route' => 'user_new_pg_step',);
                }

            }

            if (0 === strpos($pathinfo, '/utente/scegli-personaggio')) {
                // user_choose_pg
                if ($pathinfo === '/utente/scegli-personaggio.html') {
                    return array (  '_controller' => 'Gdr\\UserBundle\\Controller\\LoginController::choosePersonageAction',  '_route' => 'user_choose_pg',);
                }

                // user_choose_pg_id
                if (preg_match('#^/utente/scegli\\-personaggio/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_choose_pg_id')), array (  '_controller' => 'Gdr\\UserBundle\\Controller\\LoginController::choosePersonageAction',));
                }

                if (0 === strpos($pathinfo, '/utente/scegli-personaggio-morto')) {
                    // user_choose_dead_pg_id_action
                    if (preg_match('#^/utente/scegli\\-personaggio\\-morto/(?P<id>[^/\\-]++)\\-(?P<action>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_choose_dead_pg_id_action')), array (  '_controller' => 'Gdr\\UserBundle\\Controller\\LoginController::chooseDeadPersonageAction',));
                    }

                    // user_choose_dead_pg_id
                    if (preg_match('#^/utente/scegli\\-personaggio\\-morto/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_choose_dead_pg_id')), array (  '_controller' => 'Gdr\\UserBundle\\Controller\\LoginController::chooseDeadPersonageAction',));
                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/recupera-password')) {
            // user_do_reset
            if (preg_match('#^/recupera\\-password/(?P<token>[^/]++)/(?P<email>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_do_reset')), array (  '_controller' => 'Gdr\\UserBundle\\Controller\\LoginController::doResetAction',));
            }

            // user_reset
            if ($pathinfo === '/recupera-password.html') {
                return array (  '_controller' => 'Gdr\\UserBundle\\Controller\\LoginController::resetAction',  '_route' => 'user_reset',);
            }

        }

        if (0 === strpos($pathinfo, '/login/razza')) {
            // user_show_race
            if (preg_match('#^/login/razza/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_show_race')), array (  '_controller' => 'Gdr\\UserBundle\\Controller\\LoginController::showRaceAction',));
            }

            // user_show_attr_age
            if (0 === strpos($pathinfo, '/login/razza/parametri') && preg_match('#^/login/razza/parametri/(?P<race>[^/]++)/(?P<age>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'user_show_attr_age')), array (  '_controller' => 'Gdr\\UserBundle\\Controller\\LoginController::showAttrAgeAction',));
            }

        }

        // site_default
        if ($pathinfo === '/temp/manutenzione') {
            return array (  '_controller' => 'Gdr\\SiteBundle\\Controller\\DefaultController::defaultAction',  '_route' => 'site_default',);
        }

        // site_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'site_homepage');
            }

            return array (  '_controller' => 'Gdr\\SiteBundle\\Controller\\DefaultController::indexAction',  '_route' => 'site_homepage',);
        }

        if (0 === strpos($pathinfo, '/regolament')) {
            // site_regolamenti
            if ($pathinfo === '/regolamenti.html') {
                return array (  '_controller' => 'Gdr\\SiteBundle\\Controller\\DefaultController::showRegolamentiAction',  '_route' => 'site_regolamenti',);
            }

            // site_regolamento
            if (0 === strpos($pathinfo, '/regolamento') && preg_match('#^/regolamento/(?P<slug>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'site_regolamento')), array (  '_controller' => 'Gdr\\SiteBundle\\Controller\\DefaultController::showRegolamentoAction',));
            }

        }

        // site_ambientazione
        if ($pathinfo === '/ambientazione.html') {
            return array (  '_controller' => 'Gdr\\SiteBundle\\Controller\\DefaultController::showAmbientazioneAction',  '_route' => 'site_ambientazione',);
        }

        // site_credits
        if ($pathinfo === '/credits.html') {
            return array (  '_controller' => 'Gdr\\SiteBundle\\Controller\\DefaultController::showCreditsAction',  '_route' => 'site_credits',);
        }

        // site_gdronline
        if ($pathinfo === '/EGA069.html') {
            return array (  '_controller' => 'Gdr\\SiteBundle\\Controller\\DefaultController::gdrOnlineAction',  '_route' => 'site_gdronline',);
        }

        // site_mail
        if ($pathinfo === '/mail.html') {
            return array (  '_controller' => 'Gdr\\SiteBundle\\Controller\\DefaultController::mailAction',  '_route' => 'site_mail',);
        }

        // site_privacy
        if ($pathinfo === '/privacy-policy.html') {
            return array (  '_controller' => 'Gdr\\SiteBundle\\Controller\\DefaultController::showPrivacyAction',  '_route' => 'site_privacy',);
        }

        if (0 === strpos($pathinfo, '/news')) {
            // site_news
            if (preg_match('#^/news/(?P<slug>[^/\\.]++)\\.html$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'site_news')), array (  '_controller' => 'Gdr\\SiteBundle\\Controller\\DefaultController::showNewsAction',));
            }

            // site_list_news
            if ($pathinfo === '/news.html') {
                return array (  '_controller' => 'Gdr\\SiteBundle\\Controller\\DefaultController::showListNewsAction',  '_route' => 'site_list_news',);
            }

        }

        if (0 === strpos($pathinfo, '/cron')) {
            // cron-letters-remove
            if ($pathinfo === '/cron/letters-remove') {
                return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\CronController::deleteLettersAction',  '_route' => 'cron-letters-remove',);
            }

            if (0 === strpos($pathinfo, '/cron/property')) {
                // cron-generate-products
                if ($pathinfo === '/cron/property/generate-products') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\CronController::generateItemsFromPropertiesAction',  '_route' => 'cron-generate-products',);
                }

                // cron-tax-properties
                if ($pathinfo === '/cron/property/apply-taxes') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\CronController::applyTaxFromPropertiesAction',  '_route' => 'cron-tax-properties',);
                }

            }

            // cron-delete-old-items
            if ($pathinfo === '/cron/items/delete-old') {
                return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\CronController::expireOldItemsAction',  '_route' => 'cron-delete-old-items',);
            }

            if (0 === strpos($pathinfo, '/cron/m')) {
                // cron-check-moon
                if ($pathinfo === '/cron/moon/check') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\CronController::checkMoonAction',  '_route' => 'cron-check-moon',);
                }

                // cron-check-meteo
                if ($pathinfo === '/cron/meteo/check') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\CronController::checkMeteoAction',  '_route' => 'cron-check-meteo',);
                }

            }

            if (0 === strpos($pathinfo, '/cron/personages')) {
                if (0 === strpos($pathinfo, '/cron/personages/check-')) {
                    // cron-check-birthdays
                    if ($pathinfo === '/cron/personages/check-birthdays') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\CronController::checkBirthdaysAction',  '_route' => 'cron-check-birthdays',);
                    }

                    // cron-check-overage
                    if ($pathinfo === '/cron/personages/check-overage') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\CronController::checkOverAgeAction',  '_route' => 'cron-check-overage',);
                    }

                }

                // cron-xp
                if (0 === strpos($pathinfo, '/cron/personages/xp') && preg_match('#^/cron/personages/xp/(?P<confirm>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'cron-xp')), array (  '_controller' => 'Gdr\\GameBundle\\Controller\\CronController::assignXpAction',));
                }

            }

            // test-email
            if ($pathinfo === '/cron/test-email') {
                return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\CronController::testEmailAction',  '_route' => 'test-email',);
            }

            if (0 === strpos($pathinfo, '/cron/maintenance')) {
                // cron-clean-chat
                if ($pathinfo === '/cron/maintenance/clean-chat') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\Cron\\ChatMaintenanceController::cleanChatAction',  '_route' => 'cron-clean-chat',);
                }

                if (0 === strpos($pathinfo, '/cron/maintenance/letters/clean-')) {
                    // cron-clean-letters-readed
                    if ($pathinfo === '/cron/maintenance/letters/clean-readed') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\Cron\\LetterMaintenanceController::cleanReaded',  '_route' => 'cron-clean-letters-readed',);
                    }

                    // cron-clean-letters-not-readed
                    if ($pathinfo === '/cron/maintenance/letters/clean-not-readed') {
                        return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\Cron\\LetterMaintenanceController::cleanNotReaded',  '_route' => 'cron-clean-letters-not-readed',);
                    }

                }

                // cron-clean-archive
                if ($pathinfo === '/cron/maintenance/archive/clean') {
                    return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\Cron\\LoginMaintenanceController::cleanArchiveAction',  '_route' => 'cron-clean-archive',);
                }

            }

            // cron-player-random-death
            if ($pathinfo === '/cron/player/randomly-killing') {
                return array (  '_controller' => 'Gdr\\GameBundle\\Controller\\Cron\\RandomDeathCronController::killPlayerAction',  '_route' => 'cron-player-random-death',);
            }

        }

        // fos_js_routing_js
        if (0 === strpos($pathinfo, '/js/routing') && preg_match('#^/js/routing(?:\\.(?P<_format>js|json))?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_js_routing_js')), array (  '_controller' => 'fos_js_routing.controller:indexAction',  '_format' => 'js',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
