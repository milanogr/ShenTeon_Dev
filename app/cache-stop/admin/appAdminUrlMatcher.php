<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appAdminUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appAdminUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/admin')) {
            // sonata_admin_redirect
            if (rtrim($pathinfo, '/') === '/admin') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'sonata_admin_redirect');
                }

                return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => 'sonata_admin_dashboard',  'permanent' => 'true',  '_route' => 'sonata_admin_redirect',);
            }

            // sonata_admin_dashboard
            if ($pathinfo === '/admin/dashboard') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::dashboardAction',  '_route' => 'sonata_admin_dashboard',);
            }

            if (0 === strpos($pathinfo, '/admin/core')) {
                // sonata_admin_retrieve_form_element
                if ($pathinfo === '/admin/core/get-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:retrieveFormFieldElementAction',  '_route' => 'sonata_admin_retrieve_form_element',);
                }

                // sonata_admin_append_form_element
                if ($pathinfo === '/admin/core/append-form-field-element') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:appendFormFieldElementAction',  '_route' => 'sonata_admin_append_form_element',);
                }

                // sonata_admin_short_object_information
                if (0 === strpos($pathinfo, '/admin/core/get-short-object-description') && preg_match('#^/admin/core/get\\-short\\-object\\-description(?:\\.(?P<_format>html|json))?$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'sonata_admin_short_object_information')), array (  '_controller' => 'sonata.admin.controller.admin:getShortObjectDescriptionAction',  '_format' => 'html',));
                }

                // sonata_admin_set_object_field_value
                if ($pathinfo === '/admin/core/set-object-field-value') {
                    return array (  '_controller' => 'sonata.admin.controller.admin:setObjectFieldValueAction',  '_route' => 'sonata_admin_set_object_field_value',);
                }

            }

            // sonata_admin_search
            if ($pathinfo === '/admin/search') {
                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CoreController::searchAction',  '_route' => 'sonata_admin_search',);
            }

            // sonata_admin_retrieve_autocomplete_items
            if ($pathinfo === '/admin/core/get-autocomplete-items') {
                return array (  '_controller' => 'sonata.admin.controller.admin:retrieveAutocompleteItemsAction',  '_route' => 'sonata_admin_retrieve_autocomplete_items',);
            }

            if (0 === strpos($pathinfo, '/admin/gdr')) {
                if (0 === strpos($pathinfo, '/admin/gdr/user')) {
                    if (0 === strpos($pathinfo, '/admin/gdr/user/personage')) {
                        // admin_gdr_user_personage_list
                        if ($pathinfo === '/admin/gdr/user/personage/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.users.personage',  '_sonata_name' => 'admin_gdr_user_personage_list',  '_route' => 'admin_gdr_user_personage_list',);
                        }

                        // admin_gdr_user_personage_create
                        if ($pathinfo === '/admin/gdr/user/personage/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.users.personage',  '_sonata_name' => 'admin_gdr_user_personage_create',  '_route' => 'admin_gdr_user_personage_create',);
                        }

                        // admin_gdr_user_personage_batch
                        if ($pathinfo === '/admin/gdr/user/personage/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.users.personage',  '_sonata_name' => 'admin_gdr_user_personage_batch',  '_route' => 'admin_gdr_user_personage_batch',);
                        }

                        // admin_gdr_user_personage_edit
                        if (preg_match('#^/admin/gdr/user/personage/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_personage_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.users.personage',  '_sonata_name' => 'admin_gdr_user_personage_edit',));
                        }

                        // admin_gdr_user_personage_delete
                        if (preg_match('#^/admin/gdr/user/personage/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_personage_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.users.personage',  '_sonata_name' => 'admin_gdr_user_personage_delete',));
                        }

                        // admin_gdr_user_personage_show
                        if (preg_match('#^/admin/gdr/user/personage/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_personage_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.users.personage',  '_sonata_name' => 'admin_gdr_user_personage_show',));
                        }

                        // admin_gdr_user_personage_export
                        if ($pathinfo === '/admin/gdr/user/personage/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.users.personage',  '_sonata_name' => 'admin_gdr_user_personage_export',  '_route' => 'admin_gdr_user_personage_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/user/surname')) {
                        // admin_gdr_user_surname_list
                        if ($pathinfo === '/admin/gdr/user/surname/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.users.personage.surname',  '_sonata_name' => 'admin_gdr_user_surname_list',  '_route' => 'admin_gdr_user_surname_list',);
                        }

                        // admin_gdr_user_surname_create
                        if ($pathinfo === '/admin/gdr/user/surname/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.users.personage.surname',  '_sonata_name' => 'admin_gdr_user_surname_create',  '_route' => 'admin_gdr_user_surname_create',);
                        }

                        // admin_gdr_user_surname_batch
                        if ($pathinfo === '/admin/gdr/user/surname/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.users.personage.surname',  '_sonata_name' => 'admin_gdr_user_surname_batch',  '_route' => 'admin_gdr_user_surname_batch',);
                        }

                        // admin_gdr_user_surname_edit
                        if (preg_match('#^/admin/gdr/user/surname/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_surname_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.users.personage.surname',  '_sonata_name' => 'admin_gdr_user_surname_edit',));
                        }

                        // admin_gdr_user_surname_delete
                        if (preg_match('#^/admin/gdr/user/surname/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_surname_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.users.personage.surname',  '_sonata_name' => 'admin_gdr_user_surname_delete',));
                        }

                        // admin_gdr_user_surname_show
                        if (preg_match('#^/admin/gdr/user/surname/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_surname_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.users.personage.surname',  '_sonata_name' => 'admin_gdr_user_surname_show',));
                        }

                        // admin_gdr_user_surname_export
                        if ($pathinfo === '/admin/gdr/user/surname/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.users.personage.surname',  '_sonata_name' => 'admin_gdr_user_surname_export',  '_route' => 'admin_gdr_user_surname_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/avatar/experience')) {
                    // admin_gdr_avatar_experience_list
                    if ($pathinfo === '/admin/gdr/avatar/experience/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.users.personage.experiences',  '_sonata_name' => 'admin_gdr_avatar_experience_list',  '_route' => 'admin_gdr_avatar_experience_list',);
                    }

                    // admin_gdr_avatar_experience_create
                    if ($pathinfo === '/admin/gdr/avatar/experience/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.users.personage.experiences',  '_sonata_name' => 'admin_gdr_avatar_experience_create',  '_route' => 'admin_gdr_avatar_experience_create',);
                    }

                    // admin_gdr_avatar_experience_batch
                    if ($pathinfo === '/admin/gdr/avatar/experience/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.users.personage.experiences',  '_sonata_name' => 'admin_gdr_avatar_experience_batch',  '_route' => 'admin_gdr_avatar_experience_batch',);
                    }

                    // admin_gdr_avatar_experience_edit
                    if (preg_match('#^/admin/gdr/avatar/experience/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_avatar_experience_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.users.personage.experiences',  '_sonata_name' => 'admin_gdr_avatar_experience_edit',));
                    }

                    // admin_gdr_avatar_experience_delete
                    if (preg_match('#^/admin/gdr/avatar/experience/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_avatar_experience_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.users.personage.experiences',  '_sonata_name' => 'admin_gdr_avatar_experience_delete',));
                    }

                    // admin_gdr_avatar_experience_show
                    if (preg_match('#^/admin/gdr/avatar/experience/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_avatar_experience_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.users.personage.experiences',  '_sonata_name' => 'admin_gdr_avatar_experience_show',));
                    }

                    // admin_gdr_avatar_experience_export
                    if ($pathinfo === '/admin/gdr/avatar/experience/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.users.personage.experiences',  '_sonata_name' => 'admin_gdr_avatar_experience_export',  '_route' => 'admin_gdr_avatar_experience_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/user/skill')) {
                    // admin_gdr_user_skill_list
                    if ($pathinfo === '/admin/gdr/user/skill/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.users.personage.skill',  '_sonata_name' => 'admin_gdr_user_skill_list',  '_route' => 'admin_gdr_user_skill_list',);
                    }

                    // admin_gdr_user_skill_create
                    if ($pathinfo === '/admin/gdr/user/skill/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.users.personage.skill',  '_sonata_name' => 'admin_gdr_user_skill_create',  '_route' => 'admin_gdr_user_skill_create',);
                    }

                    // admin_gdr_user_skill_batch
                    if ($pathinfo === '/admin/gdr/user/skill/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.users.personage.skill',  '_sonata_name' => 'admin_gdr_user_skill_batch',  '_route' => 'admin_gdr_user_skill_batch',);
                    }

                    // admin_gdr_user_skill_edit
                    if (preg_match('#^/admin/gdr/user/skill/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_skill_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.users.personage.skill',  '_sonata_name' => 'admin_gdr_user_skill_edit',));
                    }

                    // admin_gdr_user_skill_delete
                    if (preg_match('#^/admin/gdr/user/skill/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_skill_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.users.personage.skill',  '_sonata_name' => 'admin_gdr_user_skill_delete',));
                    }

                    // admin_gdr_user_skill_show
                    if (preg_match('#^/admin/gdr/user/skill/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_skill_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.users.personage.skill',  '_sonata_name' => 'admin_gdr_user_skill_show',));
                    }

                    // admin_gdr_user_skill_export
                    if ($pathinfo === '/admin/gdr/user/skill/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.users.personage.skill',  '_sonata_name' => 'admin_gdr_user_skill_export',  '_route' => 'admin_gdr_user_skill_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/game/combatset')) {
                    // admin_gdr_game_combatset_list
                    if ($pathinfo === '/admin/gdr/game/combatset/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.users.personage.combat',  '_sonata_name' => 'admin_gdr_game_combatset_list',  '_route' => 'admin_gdr_game_combatset_list',);
                    }

                    // admin_gdr_game_combatset_create
                    if ($pathinfo === '/admin/gdr/game/combatset/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.users.personage.combat',  '_sonata_name' => 'admin_gdr_game_combatset_create',  '_route' => 'admin_gdr_game_combatset_create',);
                    }

                    // admin_gdr_game_combatset_batch
                    if ($pathinfo === '/admin/gdr/game/combatset/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.users.personage.combat',  '_sonata_name' => 'admin_gdr_game_combatset_batch',  '_route' => 'admin_gdr_game_combatset_batch',);
                    }

                    // admin_gdr_game_combatset_edit
                    if (preg_match('#^/admin/gdr/game/combatset/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_combatset_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.users.personage.combat',  '_sonata_name' => 'admin_gdr_game_combatset_edit',));
                    }

                    // admin_gdr_game_combatset_delete
                    if (preg_match('#^/admin/gdr/game/combatset/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_combatset_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.users.personage.combat',  '_sonata_name' => 'admin_gdr_game_combatset_delete',));
                    }

                    // admin_gdr_game_combatset_show
                    if (preg_match('#^/admin/gdr/game/combatset/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_combatset_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.users.personage.combat',  '_sonata_name' => 'admin_gdr_game_combatset_show',));
                    }

                    // admin_gdr_game_combatset_export
                    if ($pathinfo === '/admin/gdr/game/combatset/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.users.personage.combat',  '_sonata_name' => 'admin_gdr_game_combatset_export',  '_route' => 'admin_gdr_game_combatset_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/user')) {
                    if (0 === strpos($pathinfo, '/admin/gdr/user/forbiddenname')) {
                        // admin_gdr_user_forbiddenname_list
                        if ($pathinfo === '/admin/gdr/user/forbiddenname/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.users.personage.forbiddenname',  '_sonata_name' => 'admin_gdr_user_forbiddenname_list',  '_route' => 'admin_gdr_user_forbiddenname_list',);
                        }

                        // admin_gdr_user_forbiddenname_create
                        if ($pathinfo === '/admin/gdr/user/forbiddenname/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.users.personage.forbiddenname',  '_sonata_name' => 'admin_gdr_user_forbiddenname_create',  '_route' => 'admin_gdr_user_forbiddenname_create',);
                        }

                        // admin_gdr_user_forbiddenname_batch
                        if ($pathinfo === '/admin/gdr/user/forbiddenname/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.users.personage.forbiddenname',  '_sonata_name' => 'admin_gdr_user_forbiddenname_batch',  '_route' => 'admin_gdr_user_forbiddenname_batch',);
                        }

                        // admin_gdr_user_forbiddenname_edit
                        if (preg_match('#^/admin/gdr/user/forbiddenname/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_forbiddenname_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.users.personage.forbiddenname',  '_sonata_name' => 'admin_gdr_user_forbiddenname_edit',));
                        }

                        // admin_gdr_user_forbiddenname_delete
                        if (preg_match('#^/admin/gdr/user/forbiddenname/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_forbiddenname_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.users.personage.forbiddenname',  '_sonata_name' => 'admin_gdr_user_forbiddenname_delete',));
                        }

                        // admin_gdr_user_forbiddenname_show
                        if (preg_match('#^/admin/gdr/user/forbiddenname/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_forbiddenname_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.users.personage.forbiddenname',  '_sonata_name' => 'admin_gdr_user_forbiddenname_show',));
                        }

                        // admin_gdr_user_forbiddenname_export
                        if ($pathinfo === '/admin/gdr/user/forbiddenname/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.users.personage.forbiddenname',  '_sonata_name' => 'admin_gdr_user_forbiddenname_export',  '_route' => 'admin_gdr_user_forbiddenname_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/user/esilio')) {
                        // admin_gdr_user_esilio_list
                        if ($pathinfo === '/admin/gdr/user/esilio/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.users.personage.esilio',  '_sonata_name' => 'admin_gdr_user_esilio_list',  '_route' => 'admin_gdr_user_esilio_list',);
                        }

                        // admin_gdr_user_esilio_create
                        if ($pathinfo === '/admin/gdr/user/esilio/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.users.personage.esilio',  '_sonata_name' => 'admin_gdr_user_esilio_create',  '_route' => 'admin_gdr_user_esilio_create',);
                        }

                        // admin_gdr_user_esilio_batch
                        if ($pathinfo === '/admin/gdr/user/esilio/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.users.personage.esilio',  '_sonata_name' => 'admin_gdr_user_esilio_batch',  '_route' => 'admin_gdr_user_esilio_batch',);
                        }

                        // admin_gdr_user_esilio_edit
                        if (preg_match('#^/admin/gdr/user/esilio/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_esilio_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.users.personage.esilio',  '_sonata_name' => 'admin_gdr_user_esilio_edit',));
                        }

                        // admin_gdr_user_esilio_delete
                        if (preg_match('#^/admin/gdr/user/esilio/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_esilio_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.users.personage.esilio',  '_sonata_name' => 'admin_gdr_user_esilio_delete',));
                        }

                        // admin_gdr_user_esilio_show
                        if (preg_match('#^/admin/gdr/user/esilio/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_esilio_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.users.personage.esilio',  '_sonata_name' => 'admin_gdr_user_esilio_show',));
                        }

                        // admin_gdr_user_esilio_export
                        if ($pathinfo === '/admin/gdr/user/esilio/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.users.personage.esilio',  '_sonata_name' => 'admin_gdr_user_esilio_export',  '_route' => 'admin_gdr_user_esilio_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/user/language')) {
                        // admin_gdr_user_language_list
                        if ($pathinfo === '/admin/gdr/user/language/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.users.personage.language',  '_sonata_name' => 'admin_gdr_user_language_list',  '_route' => 'admin_gdr_user_language_list',);
                        }

                        // admin_gdr_user_language_create
                        if ($pathinfo === '/admin/gdr/user/language/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.users.personage.language',  '_sonata_name' => 'admin_gdr_user_language_create',  '_route' => 'admin_gdr_user_language_create',);
                        }

                        // admin_gdr_user_language_batch
                        if ($pathinfo === '/admin/gdr/user/language/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.users.personage.language',  '_sonata_name' => 'admin_gdr_user_language_batch',  '_route' => 'admin_gdr_user_language_batch',);
                        }

                        // admin_gdr_user_language_edit
                        if (preg_match('#^/admin/gdr/user/language/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_language_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.users.personage.language',  '_sonata_name' => 'admin_gdr_user_language_edit',));
                        }

                        // admin_gdr_user_language_delete
                        if (preg_match('#^/admin/gdr/user/language/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_language_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.users.personage.language',  '_sonata_name' => 'admin_gdr_user_language_delete',));
                        }

                        // admin_gdr_user_language_show
                        if (preg_match('#^/admin/gdr/user/language/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_language_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.users.personage.language',  '_sonata_name' => 'admin_gdr_user_language_show',));
                        }

                        // admin_gdr_user_language_export
                        if ($pathinfo === '/admin/gdr/user/language/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.users.personage.language',  '_sonata_name' => 'admin_gdr_user_language_export',  '_route' => 'admin_gdr_user_language_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/user/personagetype')) {
                        // admin_gdr_user_personagetype_list
                        if ($pathinfo === '/admin/gdr/user/personagetype/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.users.personage.type',  '_sonata_name' => 'admin_gdr_user_personagetype_list',  '_route' => 'admin_gdr_user_personagetype_list',);
                        }

                        // admin_gdr_user_personagetype_create
                        if ($pathinfo === '/admin/gdr/user/personagetype/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.users.personage.type',  '_sonata_name' => 'admin_gdr_user_personagetype_create',  '_route' => 'admin_gdr_user_personagetype_create',);
                        }

                        // admin_gdr_user_personagetype_batch
                        if ($pathinfo === '/admin/gdr/user/personagetype/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.users.personage.type',  '_sonata_name' => 'admin_gdr_user_personagetype_batch',  '_route' => 'admin_gdr_user_personagetype_batch',);
                        }

                        // admin_gdr_user_personagetype_edit
                        if (preg_match('#^/admin/gdr/user/personagetype/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_personagetype_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.users.personage.type',  '_sonata_name' => 'admin_gdr_user_personagetype_edit',));
                        }

                        // admin_gdr_user_personagetype_delete
                        if (preg_match('#^/admin/gdr/user/personagetype/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_personagetype_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.users.personage.type',  '_sonata_name' => 'admin_gdr_user_personagetype_delete',));
                        }

                        // admin_gdr_user_personagetype_show
                        if (preg_match('#^/admin/gdr/user/personagetype/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_personagetype_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.users.personage.type',  '_sonata_name' => 'admin_gdr_user_personagetype_show',));
                        }

                        // admin_gdr_user_personagetype_export
                        if ($pathinfo === '/admin/gdr/user/personagetype/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.users.personage.type',  '_sonata_name' => 'admin_gdr_user_personagetype_export',  '_route' => 'admin_gdr_user_personagetype_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/user/achievement')) {
                        // admin_gdr_user_achievement_list
                        if ($pathinfo === '/admin/gdr/user/achievement/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.users.personage.achievement',  '_sonata_name' => 'admin_gdr_user_achievement_list',  '_route' => 'admin_gdr_user_achievement_list',);
                        }

                        // admin_gdr_user_achievement_create
                        if ($pathinfo === '/admin/gdr/user/achievement/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.users.personage.achievement',  '_sonata_name' => 'admin_gdr_user_achievement_create',  '_route' => 'admin_gdr_user_achievement_create',);
                        }

                        // admin_gdr_user_achievement_batch
                        if ($pathinfo === '/admin/gdr/user/achievement/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.users.personage.achievement',  '_sonata_name' => 'admin_gdr_user_achievement_batch',  '_route' => 'admin_gdr_user_achievement_batch',);
                        }

                        // admin_gdr_user_achievement_edit
                        if (preg_match('#^/admin/gdr/user/achievement/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_achievement_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.users.personage.achievement',  '_sonata_name' => 'admin_gdr_user_achievement_edit',));
                        }

                        // admin_gdr_user_achievement_delete
                        if (preg_match('#^/admin/gdr/user/achievement/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_achievement_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.users.personage.achievement',  '_sonata_name' => 'admin_gdr_user_achievement_delete',));
                        }

                        // admin_gdr_user_achievement_show
                        if (preg_match('#^/admin/gdr/user/achievement/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_achievement_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.users.personage.achievement',  '_sonata_name' => 'admin_gdr_user_achievement_show',));
                        }

                        // admin_gdr_user_achievement_export
                        if ($pathinfo === '/admin/gdr/user/achievement/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.users.personage.achievement',  '_sonata_name' => 'admin_gdr_user_achievement_export',  '_route' => 'admin_gdr_user_achievement_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/race')) {
                    if (0 === strpos($pathinfo, '/admin/gdr/race/race')) {
                        // admin_gdr_race_race_list
                        if ($pathinfo === '/admin/gdr/race/race/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.race',  '_sonata_name' => 'admin_gdr_race_race_list',  '_route' => 'admin_gdr_race_race_list',);
                        }

                        // admin_gdr_race_race_create
                        if ($pathinfo === '/admin/gdr/race/race/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.race',  '_sonata_name' => 'admin_gdr_race_race_create',  '_route' => 'admin_gdr_race_race_create',);
                        }

                        // admin_gdr_race_race_batch
                        if ($pathinfo === '/admin/gdr/race/race/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.race',  '_sonata_name' => 'admin_gdr_race_race_batch',  '_route' => 'admin_gdr_race_race_batch',);
                        }

                        // admin_gdr_race_race_edit
                        if (preg_match('#^/admin/gdr/race/race/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_race_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.race',  '_sonata_name' => 'admin_gdr_race_race_edit',));
                        }

                        // admin_gdr_race_race_delete
                        if (preg_match('#^/admin/gdr/race/race/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_race_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.race',  '_sonata_name' => 'admin_gdr_race_race_delete',));
                        }

                        // admin_gdr_race_race_show
                        if (preg_match('#^/admin/gdr/race/race/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_race_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.race',  '_sonata_name' => 'admin_gdr_race_race_show',));
                        }

                        // admin_gdr_race_race_export
                        if ($pathinfo === '/admin/gdr/race/race/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.race',  '_sonata_name' => 'admin_gdr_race_race_export',  '_route' => 'admin_gdr_race_race_export',);
                        }

                        if (0 === strpos($pathinfo, '/admin/gdr/race/racelevel')) {
                            // admin_gdr_race_racelevel_list
                            if ($pathinfo === '/admin/gdr/race/racelevel/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.race.level',  '_sonata_name' => 'admin_gdr_race_racelevel_list',  '_route' => 'admin_gdr_race_racelevel_list',);
                            }

                            // admin_gdr_race_racelevel_create
                            if ($pathinfo === '/admin/gdr/race/racelevel/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.race.level',  '_sonata_name' => 'admin_gdr_race_racelevel_create',  '_route' => 'admin_gdr_race_racelevel_create',);
                            }

                            // admin_gdr_race_racelevel_batch
                            if ($pathinfo === '/admin/gdr/race/racelevel/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.race.level',  '_sonata_name' => 'admin_gdr_race_racelevel_batch',  '_route' => 'admin_gdr_race_racelevel_batch',);
                            }

                            // admin_gdr_race_racelevel_edit
                            if (preg_match('#^/admin/gdr/race/racelevel/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_racelevel_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.race.level',  '_sonata_name' => 'admin_gdr_race_racelevel_edit',));
                            }

                            // admin_gdr_race_racelevel_delete
                            if (preg_match('#^/admin/gdr/race/racelevel/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_racelevel_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.race.level',  '_sonata_name' => 'admin_gdr_race_racelevel_delete',));
                            }

                            // admin_gdr_race_racelevel_show
                            if (preg_match('#^/admin/gdr/race/racelevel/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_racelevel_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.race.level',  '_sonata_name' => 'admin_gdr_race_racelevel_show',));
                            }

                            // admin_gdr_race_racelevel_export
                            if ($pathinfo === '/admin/gdr/race/racelevel/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.race.level',  '_sonata_name' => 'admin_gdr_race_racelevel_export',  '_route' => 'admin_gdr_race_racelevel_export',);
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/race/eyecolor')) {
                        // admin_gdr_race_eyecolor_list
                        if ($pathinfo === '/admin/gdr/race/eyecolor/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.race.eyecolor',  '_sonata_name' => 'admin_gdr_race_eyecolor_list',  '_route' => 'admin_gdr_race_eyecolor_list',);
                        }

                        // admin_gdr_race_eyecolor_create
                        if ($pathinfo === '/admin/gdr/race/eyecolor/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.race.eyecolor',  '_sonata_name' => 'admin_gdr_race_eyecolor_create',  '_route' => 'admin_gdr_race_eyecolor_create',);
                        }

                        // admin_gdr_race_eyecolor_batch
                        if ($pathinfo === '/admin/gdr/race/eyecolor/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.race.eyecolor',  '_sonata_name' => 'admin_gdr_race_eyecolor_batch',  '_route' => 'admin_gdr_race_eyecolor_batch',);
                        }

                        // admin_gdr_race_eyecolor_edit
                        if (preg_match('#^/admin/gdr/race/eyecolor/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_eyecolor_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.race.eyecolor',  '_sonata_name' => 'admin_gdr_race_eyecolor_edit',));
                        }

                        // admin_gdr_race_eyecolor_delete
                        if (preg_match('#^/admin/gdr/race/eyecolor/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_eyecolor_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.race.eyecolor',  '_sonata_name' => 'admin_gdr_race_eyecolor_delete',));
                        }

                        // admin_gdr_race_eyecolor_show
                        if (preg_match('#^/admin/gdr/race/eyecolor/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_eyecolor_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.race.eyecolor',  '_sonata_name' => 'admin_gdr_race_eyecolor_show',));
                        }

                        // admin_gdr_race_eyecolor_export
                        if ($pathinfo === '/admin/gdr/race/eyecolor/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.race.eyecolor',  '_sonata_name' => 'admin_gdr_race_eyecolor_export',  '_route' => 'admin_gdr_race_eyecolor_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/race/haircolor')) {
                        // admin_gdr_race_haircolor_list
                        if ($pathinfo === '/admin/gdr/race/haircolor/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.race.haircolor',  '_sonata_name' => 'admin_gdr_race_haircolor_list',  '_route' => 'admin_gdr_race_haircolor_list',);
                        }

                        // admin_gdr_race_haircolor_create
                        if ($pathinfo === '/admin/gdr/race/haircolor/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.race.haircolor',  '_sonata_name' => 'admin_gdr_race_haircolor_create',  '_route' => 'admin_gdr_race_haircolor_create',);
                        }

                        // admin_gdr_race_haircolor_batch
                        if ($pathinfo === '/admin/gdr/race/haircolor/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.race.haircolor',  '_sonata_name' => 'admin_gdr_race_haircolor_batch',  '_route' => 'admin_gdr_race_haircolor_batch',);
                        }

                        // admin_gdr_race_haircolor_edit
                        if (preg_match('#^/admin/gdr/race/haircolor/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_haircolor_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.race.haircolor',  '_sonata_name' => 'admin_gdr_race_haircolor_edit',));
                        }

                        // admin_gdr_race_haircolor_delete
                        if (preg_match('#^/admin/gdr/race/haircolor/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_haircolor_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.race.haircolor',  '_sonata_name' => 'admin_gdr_race_haircolor_delete',));
                        }

                        // admin_gdr_race_haircolor_show
                        if (preg_match('#^/admin/gdr/race/haircolor/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_haircolor_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.race.haircolor',  '_sonata_name' => 'admin_gdr_race_haircolor_show',));
                        }

                        // admin_gdr_race_haircolor_export
                        if ($pathinfo === '/admin/gdr/race/haircolor/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.race.haircolor',  '_sonata_name' => 'admin_gdr_race_haircolor_export',  '_route' => 'admin_gdr_race_haircolor_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/race/skincolor')) {
                        // admin_gdr_race_skincolor_list
                        if ($pathinfo === '/admin/gdr/race/skincolor/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.race.skincolor',  '_sonata_name' => 'admin_gdr_race_skincolor_list',  '_route' => 'admin_gdr_race_skincolor_list',);
                        }

                        // admin_gdr_race_skincolor_create
                        if ($pathinfo === '/admin/gdr/race/skincolor/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.race.skincolor',  '_sonata_name' => 'admin_gdr_race_skincolor_create',  '_route' => 'admin_gdr_race_skincolor_create',);
                        }

                        // admin_gdr_race_skincolor_batch
                        if ($pathinfo === '/admin/gdr/race/skincolor/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.race.skincolor',  '_sonata_name' => 'admin_gdr_race_skincolor_batch',  '_route' => 'admin_gdr_race_skincolor_batch',);
                        }

                        // admin_gdr_race_skincolor_edit
                        if (preg_match('#^/admin/gdr/race/skincolor/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_skincolor_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.race.skincolor',  '_sonata_name' => 'admin_gdr_race_skincolor_edit',));
                        }

                        // admin_gdr_race_skincolor_delete
                        if (preg_match('#^/admin/gdr/race/skincolor/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_skincolor_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.race.skincolor',  '_sonata_name' => 'admin_gdr_race_skincolor_delete',));
                        }

                        // admin_gdr_race_skincolor_show
                        if (preg_match('#^/admin/gdr/race/skincolor/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_skincolor_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.race.skincolor',  '_sonata_name' => 'admin_gdr_race_skincolor_show',));
                        }

                        // admin_gdr_race_skincolor_export
                        if ($pathinfo === '/admin/gdr/race/skincolor/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.race.skincolor',  '_sonata_name' => 'admin_gdr_race_skincolor_export',  '_route' => 'admin_gdr_race_skincolor_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/race/furcolor')) {
                        // admin_gdr_race_furcolor_list
                        if ($pathinfo === '/admin/gdr/race/furcolor/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.race.furcolor',  '_sonata_name' => 'admin_gdr_race_furcolor_list',  '_route' => 'admin_gdr_race_furcolor_list',);
                        }

                        // admin_gdr_race_furcolor_create
                        if ($pathinfo === '/admin/gdr/race/furcolor/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.race.furcolor',  '_sonata_name' => 'admin_gdr_race_furcolor_create',  '_route' => 'admin_gdr_race_furcolor_create',);
                        }

                        // admin_gdr_race_furcolor_batch
                        if ($pathinfo === '/admin/gdr/race/furcolor/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.race.furcolor',  '_sonata_name' => 'admin_gdr_race_furcolor_batch',  '_route' => 'admin_gdr_race_furcolor_batch',);
                        }

                        // admin_gdr_race_furcolor_edit
                        if (preg_match('#^/admin/gdr/race/furcolor/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_furcolor_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.race.furcolor',  '_sonata_name' => 'admin_gdr_race_furcolor_edit',));
                        }

                        // admin_gdr_race_furcolor_delete
                        if (preg_match('#^/admin/gdr/race/furcolor/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_furcolor_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.race.furcolor',  '_sonata_name' => 'admin_gdr_race_furcolor_delete',));
                        }

                        // admin_gdr_race_furcolor_show
                        if (preg_match('#^/admin/gdr/race/furcolor/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_furcolor_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.race.furcolor',  '_sonata_name' => 'admin_gdr_race_furcolor_show',));
                        }

                        // admin_gdr_race_furcolor_export
                        if ($pathinfo === '/admin/gdr/race/furcolor/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.race.furcolor',  '_sonata_name' => 'admin_gdr_race_furcolor_export',  '_route' => 'admin_gdr_race_furcolor_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/race/squamacolor')) {
                        // admin_gdr_race_squamacolor_list
                        if ($pathinfo === '/admin/gdr/race/squamacolor/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.race.squamacolor',  '_sonata_name' => 'admin_gdr_race_squamacolor_list',  '_route' => 'admin_gdr_race_squamacolor_list',);
                        }

                        // admin_gdr_race_squamacolor_create
                        if ($pathinfo === '/admin/gdr/race/squamacolor/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.race.squamacolor',  '_sonata_name' => 'admin_gdr_race_squamacolor_create',  '_route' => 'admin_gdr_race_squamacolor_create',);
                        }

                        // admin_gdr_race_squamacolor_batch
                        if ($pathinfo === '/admin/gdr/race/squamacolor/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.race.squamacolor',  '_sonata_name' => 'admin_gdr_race_squamacolor_batch',  '_route' => 'admin_gdr_race_squamacolor_batch',);
                        }

                        // admin_gdr_race_squamacolor_edit
                        if (preg_match('#^/admin/gdr/race/squamacolor/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_squamacolor_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.race.squamacolor',  '_sonata_name' => 'admin_gdr_race_squamacolor_edit',));
                        }

                        // admin_gdr_race_squamacolor_delete
                        if (preg_match('#^/admin/gdr/race/squamacolor/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_squamacolor_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.race.squamacolor',  '_sonata_name' => 'admin_gdr_race_squamacolor_delete',));
                        }

                        // admin_gdr_race_squamacolor_show
                        if (preg_match('#^/admin/gdr/race/squamacolor/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_race_squamacolor_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.race.squamacolor',  '_sonata_name' => 'admin_gdr_race_squamacolor_show',));
                        }

                        // admin_gdr_race_squamacolor_export
                        if ($pathinfo === '/admin/gdr/race/squamacolor/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.race.squamacolor',  '_sonata_name' => 'admin_gdr_race_squamacolor_export',  '_route' => 'admin_gdr_race_squamacolor_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/items')) {
                    if (0 === strpos($pathinfo, '/admin/gdr/items/item')) {
                        // admin_gdr_items_item_list
                        if ($pathinfo === '/admin/gdr/items/item/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.items.item',  '_sonata_name' => 'admin_gdr_items_item_list',  '_route' => 'admin_gdr_items_item_list',);
                        }

                        // admin_gdr_items_item_create
                        if ($pathinfo === '/admin/gdr/items/item/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.items.item',  '_sonata_name' => 'admin_gdr_items_item_create',  '_route' => 'admin_gdr_items_item_create',);
                        }

                        // admin_gdr_items_item_batch
                        if ($pathinfo === '/admin/gdr/items/item/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.items.item',  '_sonata_name' => 'admin_gdr_items_item_batch',  '_route' => 'admin_gdr_items_item_batch',);
                        }

                        // admin_gdr_items_item_edit
                        if (preg_match('#^/admin/gdr/items/item/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_items_item_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.items.item',  '_sonata_name' => 'admin_gdr_items_item_edit',));
                        }

                        // admin_gdr_items_item_delete
                        if (preg_match('#^/admin/gdr/items/item/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_items_item_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.items.item',  '_sonata_name' => 'admin_gdr_items_item_delete',));
                        }

                        // admin_gdr_items_item_show
                        if (preg_match('#^/admin/gdr/items/item/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_items_item_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.items.item',  '_sonata_name' => 'admin_gdr_items_item_show',));
                        }

                        // admin_gdr_items_item_export
                        if ($pathinfo === '/admin/gdr/items/item/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.items.item',  '_sonata_name' => 'admin_gdr_items_item_export',  '_route' => 'admin_gdr_items_item_export',);
                        }

                        if (0 === strpos($pathinfo, '/admin/gdr/items/itemtype')) {
                            // admin_gdr_items_itemtype_list
                            if ($pathinfo === '/admin/gdr/items/itemtype/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.items.itemtype',  '_sonata_name' => 'admin_gdr_items_itemtype_list',  '_route' => 'admin_gdr_items_itemtype_list',);
                            }

                            // admin_gdr_items_itemtype_create
                            if ($pathinfo === '/admin/gdr/items/itemtype/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.items.itemtype',  '_sonata_name' => 'admin_gdr_items_itemtype_create',  '_route' => 'admin_gdr_items_itemtype_create',);
                            }

                            // admin_gdr_items_itemtype_batch
                            if ($pathinfo === '/admin/gdr/items/itemtype/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.items.itemtype',  '_sonata_name' => 'admin_gdr_items_itemtype_batch',  '_route' => 'admin_gdr_items_itemtype_batch',);
                            }

                            // admin_gdr_items_itemtype_edit
                            if (preg_match('#^/admin/gdr/items/itemtype/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_items_itemtype_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.items.itemtype',  '_sonata_name' => 'admin_gdr_items_itemtype_edit',));
                            }

                            // admin_gdr_items_itemtype_delete
                            if (preg_match('#^/admin/gdr/items/itemtype/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_items_itemtype_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.items.itemtype',  '_sonata_name' => 'admin_gdr_items_itemtype_delete',));
                            }

                            // admin_gdr_items_itemtype_show
                            if (preg_match('#^/admin/gdr/items/itemtype/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_items_itemtype_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.items.itemtype',  '_sonata_name' => 'admin_gdr_items_itemtype_show',));
                            }

                            // admin_gdr_items_itemtype_export
                            if ($pathinfo === '/admin/gdr/items/itemtype/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.items.itemtype',  '_sonata_name' => 'admin_gdr_items_itemtype_export',  '_route' => 'admin_gdr_items_itemtype_export',);
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/items/property')) {
                        // admin_gdr_items_property_list
                        if ($pathinfo === '/admin/gdr/items/property/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.items.property',  '_sonata_name' => 'admin_gdr_items_property_list',  '_route' => 'admin_gdr_items_property_list',);
                        }

                        // admin_gdr_items_property_create
                        if ($pathinfo === '/admin/gdr/items/property/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.items.property',  '_sonata_name' => 'admin_gdr_items_property_create',  '_route' => 'admin_gdr_items_property_create',);
                        }

                        // admin_gdr_items_property_batch
                        if ($pathinfo === '/admin/gdr/items/property/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.items.property',  '_sonata_name' => 'admin_gdr_items_property_batch',  '_route' => 'admin_gdr_items_property_batch',);
                        }

                        // admin_gdr_items_property_edit
                        if (preg_match('#^/admin/gdr/items/property/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_items_property_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.items.property',  '_sonata_name' => 'admin_gdr_items_property_edit',));
                        }

                        // admin_gdr_items_property_delete
                        if (preg_match('#^/admin/gdr/items/property/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_items_property_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.items.property',  '_sonata_name' => 'admin_gdr_items_property_delete',));
                        }

                        // admin_gdr_items_property_show
                        if (preg_match('#^/admin/gdr/items/property/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_items_property_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.items.property',  '_sonata_name' => 'admin_gdr_items_property_show',));
                        }

                        // admin_gdr_items_property_export
                        if ($pathinfo === '/admin/gdr/items/property/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.items.property',  '_sonata_name' => 'admin_gdr_items_property_export',  '_route' => 'admin_gdr_items_property_export',);
                        }

                        if (0 === strpos($pathinfo, '/admin/gdr/items/propertyitem')) {
                            // admin_gdr_items_propertyitem_list
                            if ($pathinfo === '/admin/gdr/items/propertyitem/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.items.property.items',  '_sonata_name' => 'admin_gdr_items_propertyitem_list',  '_route' => 'admin_gdr_items_propertyitem_list',);
                            }

                            // admin_gdr_items_propertyitem_create
                            if ($pathinfo === '/admin/gdr/items/propertyitem/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.items.property.items',  '_sonata_name' => 'admin_gdr_items_propertyitem_create',  '_route' => 'admin_gdr_items_propertyitem_create',);
                            }

                            // admin_gdr_items_propertyitem_batch
                            if ($pathinfo === '/admin/gdr/items/propertyitem/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.items.property.items',  '_sonata_name' => 'admin_gdr_items_propertyitem_batch',  '_route' => 'admin_gdr_items_propertyitem_batch',);
                            }

                            // admin_gdr_items_propertyitem_edit
                            if (preg_match('#^/admin/gdr/items/propertyitem/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_items_propertyitem_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.items.property.items',  '_sonata_name' => 'admin_gdr_items_propertyitem_edit',));
                            }

                            // admin_gdr_items_propertyitem_delete
                            if (preg_match('#^/admin/gdr/items/propertyitem/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_items_propertyitem_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.items.property.items',  '_sonata_name' => 'admin_gdr_items_propertyitem_delete',));
                            }

                            // admin_gdr_items_propertyitem_show
                            if (preg_match('#^/admin/gdr/items/propertyitem/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_items_propertyitem_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.items.property.items',  '_sonata_name' => 'admin_gdr_items_propertyitem_show',));
                            }

                            // admin_gdr_items_propertyitem_export
                            if ($pathinfo === '/admin/gdr/items/propertyitem/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.items.property.items',  '_sonata_name' => 'admin_gdr_items_propertyitem_export',  '_route' => 'admin_gdr_items_propertyitem_export',);
                            }

                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/game/enclave')) {
                    // admin_gdr_game_enclave_list
                    if ($pathinfo === '/admin/gdr/game/enclave/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.enclave',  '_sonata_name' => 'admin_gdr_game_enclave_list',  '_route' => 'admin_gdr_game_enclave_list',);
                    }

                    // admin_gdr_game_enclave_create
                    if ($pathinfo === '/admin/gdr/game/enclave/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.enclave',  '_sonata_name' => 'admin_gdr_game_enclave_create',  '_route' => 'admin_gdr_game_enclave_create',);
                    }

                    // admin_gdr_game_enclave_batch
                    if ($pathinfo === '/admin/gdr/game/enclave/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.enclave',  '_sonata_name' => 'admin_gdr_game_enclave_batch',  '_route' => 'admin_gdr_game_enclave_batch',);
                    }

                    // admin_gdr_game_enclave_edit
                    if (preg_match('#^/admin/gdr/game/enclave/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_enclave_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.enclave',  '_sonata_name' => 'admin_gdr_game_enclave_edit',));
                    }

                    // admin_gdr_game_enclave_delete
                    if (preg_match('#^/admin/gdr/game/enclave/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_enclave_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.enclave',  '_sonata_name' => 'admin_gdr_game_enclave_delete',));
                    }

                    // admin_gdr_game_enclave_show
                    if (preg_match('#^/admin/gdr/game/enclave/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_enclave_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.enclave',  '_sonata_name' => 'admin_gdr_game_enclave_show',));
                    }

                    // admin_gdr_game_enclave_export
                    if ($pathinfo === '/admin/gdr/game/enclave/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.enclave',  '_sonata_name' => 'admin_gdr_game_enclave_export',  '_route' => 'admin_gdr_game_enclave_export',);
                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/game/enclavecategory')) {
                        // admin_gdr_game_enclavecategory_list
                        if ($pathinfo === '/admin/gdr/game/enclavecategory/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.enclave.category',  '_sonata_name' => 'admin_gdr_game_enclavecategory_list',  '_route' => 'admin_gdr_game_enclavecategory_list',);
                        }

                        // admin_gdr_game_enclavecategory_create
                        if ($pathinfo === '/admin/gdr/game/enclavecategory/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.enclave.category',  '_sonata_name' => 'admin_gdr_game_enclavecategory_create',  '_route' => 'admin_gdr_game_enclavecategory_create',);
                        }

                        // admin_gdr_game_enclavecategory_batch
                        if ($pathinfo === '/admin/gdr/game/enclavecategory/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.enclave.category',  '_sonata_name' => 'admin_gdr_game_enclavecategory_batch',  '_route' => 'admin_gdr_game_enclavecategory_batch',);
                        }

                        // admin_gdr_game_enclavecategory_edit
                        if (preg_match('#^/admin/gdr/game/enclavecategory/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_enclavecategory_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.enclave.category',  '_sonata_name' => 'admin_gdr_game_enclavecategory_edit',));
                        }

                        // admin_gdr_game_enclavecategory_delete
                        if (preg_match('#^/admin/gdr/game/enclavecategory/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_enclavecategory_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.enclave.category',  '_sonata_name' => 'admin_gdr_game_enclavecategory_delete',));
                        }

                        // admin_gdr_game_enclavecategory_show
                        if (preg_match('#^/admin/gdr/game/enclavecategory/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_enclavecategory_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.enclave.category',  '_sonata_name' => 'admin_gdr_game_enclavecategory_show',));
                        }

                        // admin_gdr_game_enclavecategory_export
                        if ($pathinfo === '/admin/gdr/game/enclavecategory/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.enclave.category',  '_sonata_name' => 'admin_gdr_game_enclavecategory_export',  '_route' => 'admin_gdr_game_enclavecategory_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/game/enclavelevel')) {
                        // admin_gdr_game_enclavelevel_list
                        if ($pathinfo === '/admin/gdr/game/enclavelevel/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.enclave.level',  '_sonata_name' => 'admin_gdr_game_enclavelevel_list',  '_route' => 'admin_gdr_game_enclavelevel_list',);
                        }

                        // admin_gdr_game_enclavelevel_create
                        if ($pathinfo === '/admin/gdr/game/enclavelevel/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.enclave.level',  '_sonata_name' => 'admin_gdr_game_enclavelevel_create',  '_route' => 'admin_gdr_game_enclavelevel_create',);
                        }

                        // admin_gdr_game_enclavelevel_batch
                        if ($pathinfo === '/admin/gdr/game/enclavelevel/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.enclave.level',  '_sonata_name' => 'admin_gdr_game_enclavelevel_batch',  '_route' => 'admin_gdr_game_enclavelevel_batch',);
                        }

                        // admin_gdr_game_enclavelevel_edit
                        if (preg_match('#^/admin/gdr/game/enclavelevel/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_enclavelevel_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.enclave.level',  '_sonata_name' => 'admin_gdr_game_enclavelevel_edit',));
                        }

                        // admin_gdr_game_enclavelevel_delete
                        if (preg_match('#^/admin/gdr/game/enclavelevel/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_enclavelevel_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.enclave.level',  '_sonata_name' => 'admin_gdr_game_enclavelevel_delete',));
                        }

                        // admin_gdr_game_enclavelevel_show
                        if (preg_match('#^/admin/gdr/game/enclavelevel/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_enclavelevel_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.enclave.level',  '_sonata_name' => 'admin_gdr_game_enclavelevel_show',));
                        }

                        // admin_gdr_game_enclavelevel_export
                        if ($pathinfo === '/admin/gdr/game/enclavelevel/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.enclave.level',  '_sonata_name' => 'admin_gdr_game_enclavelevel_export',  '_route' => 'admin_gdr_game_enclavelevel_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/game/enclaverank')) {
                        // admin_gdr_game_enclaverank_list
                        if ($pathinfo === '/admin/gdr/game/enclaverank/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.enclave.rank',  '_sonata_name' => 'admin_gdr_game_enclaverank_list',  '_route' => 'admin_gdr_game_enclaverank_list',);
                        }

                        // admin_gdr_game_enclaverank_create
                        if ($pathinfo === '/admin/gdr/game/enclaverank/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.enclave.rank',  '_sonata_name' => 'admin_gdr_game_enclaverank_create',  '_route' => 'admin_gdr_game_enclaverank_create',);
                        }

                        // admin_gdr_game_enclaverank_batch
                        if ($pathinfo === '/admin/gdr/game/enclaverank/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.enclave.rank',  '_sonata_name' => 'admin_gdr_game_enclaverank_batch',  '_route' => 'admin_gdr_game_enclaverank_batch',);
                        }

                        // admin_gdr_game_enclaverank_edit
                        if (preg_match('#^/admin/gdr/game/enclaverank/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_enclaverank_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.enclave.rank',  '_sonata_name' => 'admin_gdr_game_enclaverank_edit',));
                        }

                        // admin_gdr_game_enclaverank_delete
                        if (preg_match('#^/admin/gdr/game/enclaverank/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_enclaverank_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.enclave.rank',  '_sonata_name' => 'admin_gdr_game_enclaverank_delete',));
                        }

                        // admin_gdr_game_enclaverank_show
                        if (preg_match('#^/admin/gdr/game/enclaverank/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_enclaverank_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.enclave.rank',  '_sonata_name' => 'admin_gdr_game_enclaverank_show',));
                        }

                        // admin_gdr_game_enclaverank_export
                        if ($pathinfo === '/admin/gdr/game/enclaverank/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.enclave.rank',  '_sonata_name' => 'admin_gdr_game_enclaverank_export',  '_route' => 'admin_gdr_game_enclaverank_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/user')) {
                    if (0 === strpos($pathinfo, '/admin/gdr/user/title')) {
                        // admin_gdr_user_title_list
                        if ($pathinfo === '/admin/gdr/user/title/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.enclave.title',  '_sonata_name' => 'admin_gdr_user_title_list',  '_route' => 'admin_gdr_user_title_list',);
                        }

                        // admin_gdr_user_title_create
                        if ($pathinfo === '/admin/gdr/user/title/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.enclave.title',  '_sonata_name' => 'admin_gdr_user_title_create',  '_route' => 'admin_gdr_user_title_create',);
                        }

                        // admin_gdr_user_title_batch
                        if ($pathinfo === '/admin/gdr/user/title/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.enclave.title',  '_sonata_name' => 'admin_gdr_user_title_batch',  '_route' => 'admin_gdr_user_title_batch',);
                        }

                        // admin_gdr_user_title_edit
                        if (preg_match('#^/admin/gdr/user/title/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_title_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.enclave.title',  '_sonata_name' => 'admin_gdr_user_title_edit',));
                        }

                        // admin_gdr_user_title_delete
                        if (preg_match('#^/admin/gdr/user/title/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_title_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.enclave.title',  '_sonata_name' => 'admin_gdr_user_title_delete',));
                        }

                        // admin_gdr_user_title_show
                        if (preg_match('#^/admin/gdr/user/title/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_title_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.enclave.title',  '_sonata_name' => 'admin_gdr_user_title_show',));
                        }

                        // admin_gdr_user_title_export
                        if ($pathinfo === '/admin/gdr/user/title/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.enclave.title',  '_sonata_name' => 'admin_gdr_user_title_export',  '_route' => 'admin_gdr_user_title_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/user/spell')) {
                        if (0 === strpos($pathinfo, '/admin/gdr/user/spellcategory')) {
                            // admin_gdr_user_spellcategory_list
                            if ($pathinfo === '/admin/gdr/user/spellcategory/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.category',  '_sonata_name' => 'admin_gdr_user_spellcategory_list',  '_route' => 'admin_gdr_user_spellcategory_list',);
                            }

                            // admin_gdr_user_spellcategory_create
                            if ($pathinfo === '/admin/gdr/user/spellcategory/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.category',  '_sonata_name' => 'admin_gdr_user_spellcategory_create',  '_route' => 'admin_gdr_user_spellcategory_create',);
                            }

                            // admin_gdr_user_spellcategory_batch
                            if ($pathinfo === '/admin/gdr/user/spellcategory/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.category',  '_sonata_name' => 'admin_gdr_user_spellcategory_batch',  '_route' => 'admin_gdr_user_spellcategory_batch',);
                            }

                            // admin_gdr_user_spellcategory_edit
                            if (preg_match('#^/admin/gdr/user/spellcategory/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_spellcategory_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.category',  '_sonata_name' => 'admin_gdr_user_spellcategory_edit',));
                            }

                            // admin_gdr_user_spellcategory_delete
                            if (preg_match('#^/admin/gdr/user/spellcategory/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_spellcategory_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.category',  '_sonata_name' => 'admin_gdr_user_spellcategory_delete',));
                            }

                            // admin_gdr_user_spellcategory_show
                            if (preg_match('#^/admin/gdr/user/spellcategory/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_spellcategory_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.category',  '_sonata_name' => 'admin_gdr_user_spellcategory_show',));
                            }

                            // admin_gdr_user_spellcategory_export
                            if ($pathinfo === '/admin/gdr/user/spellcategory/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.category',  '_sonata_name' => 'admin_gdr_user_spellcategory_export',  '_route' => 'admin_gdr_user_spellcategory_export',);
                            }

                        }

                        // admin_gdr_user_spell_list
                        if ($pathinfo === '/admin/gdr/user/spell/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.spells',  '_sonata_name' => 'admin_gdr_user_spell_list',  '_route' => 'admin_gdr_user_spell_list',);
                        }

                        // admin_gdr_user_spell_create
                        if ($pathinfo === '/admin/gdr/user/spell/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.spells',  '_sonata_name' => 'admin_gdr_user_spell_create',  '_route' => 'admin_gdr_user_spell_create',);
                        }

                        // admin_gdr_user_spell_batch
                        if ($pathinfo === '/admin/gdr/user/spell/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.spells',  '_sonata_name' => 'admin_gdr_user_spell_batch',  '_route' => 'admin_gdr_user_spell_batch',);
                        }

                        // admin_gdr_user_spell_edit
                        if (preg_match('#^/admin/gdr/user/spell/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_spell_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.spells',  '_sonata_name' => 'admin_gdr_user_spell_edit',));
                        }

                        // admin_gdr_user_spell_delete
                        if (preg_match('#^/admin/gdr/user/spell/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_spell_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.spells',  '_sonata_name' => 'admin_gdr_user_spell_delete',));
                        }

                        // admin_gdr_user_spell_show
                        if (preg_match('#^/admin/gdr/user/spell/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_spell_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.spells',  '_sonata_name' => 'admin_gdr_user_spell_show',));
                        }

                        // admin_gdr_user_spell_export
                        if ($pathinfo === '/admin/gdr/user/spell/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.grimory.spell.spells',  '_sonata_name' => 'admin_gdr_user_spell_export',  '_route' => 'admin_gdr_user_spell_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/game/forum')) {
                    // admin_gdr_game_forum_list
                    if ($pathinfo === '/admin/gdr/game/forum/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.forum',  '_sonata_name' => 'admin_gdr_game_forum_list',  '_route' => 'admin_gdr_game_forum_list',);
                    }

                    // admin_gdr_game_forum_create
                    if ($pathinfo === '/admin/gdr/game/forum/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.forum',  '_sonata_name' => 'admin_gdr_game_forum_create',  '_route' => 'admin_gdr_game_forum_create',);
                    }

                    // admin_gdr_game_forum_batch
                    if ($pathinfo === '/admin/gdr/game/forum/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.forum',  '_sonata_name' => 'admin_gdr_game_forum_batch',  '_route' => 'admin_gdr_game_forum_batch',);
                    }

                    // admin_gdr_game_forum_edit
                    if (preg_match('#^/admin/gdr/game/forum/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_forum_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.forum',  '_sonata_name' => 'admin_gdr_game_forum_edit',));
                    }

                    // admin_gdr_game_forum_delete
                    if (preg_match('#^/admin/gdr/game/forum/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_forum_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.forum',  '_sonata_name' => 'admin_gdr_game_forum_delete',));
                    }

                    // admin_gdr_game_forum_show
                    if (preg_match('#^/admin/gdr/game/forum/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_forum_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.forum',  '_sonata_name' => 'admin_gdr_game_forum_show',));
                    }

                    // admin_gdr_game_forum_export
                    if ($pathinfo === '/admin/gdr/game/forum/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.forum',  '_sonata_name' => 'admin_gdr_game_forum_export',  '_route' => 'admin_gdr_game_forum_export',);
                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/game/forumcategory')) {
                        // admin_gdr_game_forumcategory_list
                        if ($pathinfo === '/admin/gdr/game/forumcategory/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.forum.category',  '_sonata_name' => 'admin_gdr_game_forumcategory_list',  '_route' => 'admin_gdr_game_forumcategory_list',);
                        }

                        // admin_gdr_game_forumcategory_create
                        if ($pathinfo === '/admin/gdr/game/forumcategory/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.forum.category',  '_sonata_name' => 'admin_gdr_game_forumcategory_create',  '_route' => 'admin_gdr_game_forumcategory_create',);
                        }

                        // admin_gdr_game_forumcategory_batch
                        if ($pathinfo === '/admin/gdr/game/forumcategory/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.forum.category',  '_sonata_name' => 'admin_gdr_game_forumcategory_batch',  '_route' => 'admin_gdr_game_forumcategory_batch',);
                        }

                        // admin_gdr_game_forumcategory_edit
                        if (preg_match('#^/admin/gdr/game/forumcategory/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_forumcategory_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.forum.category',  '_sonata_name' => 'admin_gdr_game_forumcategory_edit',));
                        }

                        // admin_gdr_game_forumcategory_delete
                        if (preg_match('#^/admin/gdr/game/forumcategory/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_forumcategory_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.forum.category',  '_sonata_name' => 'admin_gdr_game_forumcategory_delete',));
                        }

                        // admin_gdr_game_forumcategory_show
                        if (preg_match('#^/admin/gdr/game/forumcategory/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_forumcategory_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.forum.category',  '_sonata_name' => 'admin_gdr_game_forumcategory_show',));
                        }

                        // admin_gdr_game_forumcategory_export
                        if ($pathinfo === '/admin/gdr/game/forumcategory/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.forum.category',  '_sonata_name' => 'admin_gdr_game_forumcategory_export',  '_route' => 'admin_gdr_game_forumcategory_export',);
                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/meteo/m')) {
                    if (0 === strpos($pathinfo, '/admin/gdr/meteo/moon')) {
                        // admin_gdr_meteo_moon_list
                        if ($pathinfo === '/admin/gdr/meteo/moon/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.moon',  '_sonata_name' => 'admin_gdr_meteo_moon_list',  '_route' => 'admin_gdr_meteo_moon_list',);
                        }

                        // admin_gdr_meteo_moon_create
                        if ($pathinfo === '/admin/gdr/meteo/moon/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.moon',  '_sonata_name' => 'admin_gdr_meteo_moon_create',  '_route' => 'admin_gdr_meteo_moon_create',);
                        }

                        // admin_gdr_meteo_moon_batch
                        if ($pathinfo === '/admin/gdr/meteo/moon/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.moon',  '_sonata_name' => 'admin_gdr_meteo_moon_batch',  '_route' => 'admin_gdr_meteo_moon_batch',);
                        }

                        // admin_gdr_meteo_moon_edit
                        if (preg_match('#^/admin/gdr/meteo/moon/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_moon_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.moon',  '_sonata_name' => 'admin_gdr_meteo_moon_edit',));
                        }

                        // admin_gdr_meteo_moon_delete
                        if (preg_match('#^/admin/gdr/meteo/moon/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_moon_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.moon',  '_sonata_name' => 'admin_gdr_meteo_moon_delete',));
                        }

                        // admin_gdr_meteo_moon_show
                        if (preg_match('#^/admin/gdr/meteo/moon/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_moon_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.moon',  '_sonata_name' => 'admin_gdr_meteo_moon_show',));
                        }

                        // admin_gdr_meteo_moon_export
                        if ($pathinfo === '/admin/gdr/meteo/moon/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.moon',  '_sonata_name' => 'admin_gdr_meteo_moon_export',  '_route' => 'admin_gdr_meteo_moon_export',);
                        }

                        if (0 === strpos($pathinfo, '/admin/gdr/meteo/moonstatus')) {
                            // admin_gdr_meteo_moonstatus_list
                            if ($pathinfo === '/admin/gdr/meteo/moonstatus/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.moon.status',  '_sonata_name' => 'admin_gdr_meteo_moonstatus_list',  '_route' => 'admin_gdr_meteo_moonstatus_list',);
                            }

                            // admin_gdr_meteo_moonstatus_create
                            if ($pathinfo === '/admin/gdr/meteo/moonstatus/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.moon.status',  '_sonata_name' => 'admin_gdr_meteo_moonstatus_create',  '_route' => 'admin_gdr_meteo_moonstatus_create',);
                            }

                            // admin_gdr_meteo_moonstatus_batch
                            if ($pathinfo === '/admin/gdr/meteo/moonstatus/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.moon.status',  '_sonata_name' => 'admin_gdr_meteo_moonstatus_batch',  '_route' => 'admin_gdr_meteo_moonstatus_batch',);
                            }

                            // admin_gdr_meteo_moonstatus_edit
                            if (preg_match('#^/admin/gdr/meteo/moonstatus/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_moonstatus_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.moon.status',  '_sonata_name' => 'admin_gdr_meteo_moonstatus_edit',));
                            }

                            // admin_gdr_meteo_moonstatus_delete
                            if (preg_match('#^/admin/gdr/meteo/moonstatus/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_moonstatus_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.moon.status',  '_sonata_name' => 'admin_gdr_meteo_moonstatus_delete',));
                            }

                            // admin_gdr_meteo_moonstatus_show
                            if (preg_match('#^/admin/gdr/meteo/moonstatus/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_moonstatus_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.moon.status',  '_sonata_name' => 'admin_gdr_meteo_moonstatus_show',));
                            }

                            // admin_gdr_meteo_moonstatus_export
                            if ($pathinfo === '/admin/gdr/meteo/moonstatus/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.moon.status',  '_sonata_name' => 'admin_gdr_meteo_moonstatus_export',  '_route' => 'admin_gdr_meteo_moonstatus_export',);
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/meteo/meteo')) {
                        if (0 === strpos($pathinfo, '/admin/gdr/meteo/meteomonth')) {
                            // admin_gdr_meteo_meteomonth_list
                            if ($pathinfo === '/admin/gdr/meteo/meteomonth/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.meteo.month',  '_sonata_name' => 'admin_gdr_meteo_meteomonth_list',  '_route' => 'admin_gdr_meteo_meteomonth_list',);
                            }

                            // admin_gdr_meteo_meteomonth_create
                            if ($pathinfo === '/admin/gdr/meteo/meteomonth/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.meteo.month',  '_sonata_name' => 'admin_gdr_meteo_meteomonth_create',  '_route' => 'admin_gdr_meteo_meteomonth_create',);
                            }

                            // admin_gdr_meteo_meteomonth_batch
                            if ($pathinfo === '/admin/gdr/meteo/meteomonth/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.meteo.month',  '_sonata_name' => 'admin_gdr_meteo_meteomonth_batch',  '_route' => 'admin_gdr_meteo_meteomonth_batch',);
                            }

                            // admin_gdr_meteo_meteomonth_edit
                            if (preg_match('#^/admin/gdr/meteo/meteomonth/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteomonth_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.meteo.month',  '_sonata_name' => 'admin_gdr_meteo_meteomonth_edit',));
                            }

                            // admin_gdr_meteo_meteomonth_delete
                            if (preg_match('#^/admin/gdr/meteo/meteomonth/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteomonth_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.meteo.month',  '_sonata_name' => 'admin_gdr_meteo_meteomonth_delete',));
                            }

                            // admin_gdr_meteo_meteomonth_show
                            if (preg_match('#^/admin/gdr/meteo/meteomonth/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteomonth_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.meteo.month',  '_sonata_name' => 'admin_gdr_meteo_meteomonth_show',));
                            }

                            // admin_gdr_meteo_meteomonth_export
                            if ($pathinfo === '/admin/gdr/meteo/meteomonth/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.meteo.month',  '_sonata_name' => 'admin_gdr_meteo_meteomonth_export',  '_route' => 'admin_gdr_meteo_meteomonth_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/gdr/meteo/meteoseason')) {
                            // admin_gdr_meteo_meteoseason_list
                            if ($pathinfo === '/admin/gdr/meteo/meteoseason/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.meteo.season',  '_sonata_name' => 'admin_gdr_meteo_meteoseason_list',  '_route' => 'admin_gdr_meteo_meteoseason_list',);
                            }

                            // admin_gdr_meteo_meteoseason_create
                            if ($pathinfo === '/admin/gdr/meteo/meteoseason/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.meteo.season',  '_sonata_name' => 'admin_gdr_meteo_meteoseason_create',  '_route' => 'admin_gdr_meteo_meteoseason_create',);
                            }

                            // admin_gdr_meteo_meteoseason_batch
                            if ($pathinfo === '/admin/gdr/meteo/meteoseason/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.meteo.season',  '_sonata_name' => 'admin_gdr_meteo_meteoseason_batch',  '_route' => 'admin_gdr_meteo_meteoseason_batch',);
                            }

                            // admin_gdr_meteo_meteoseason_edit
                            if (preg_match('#^/admin/gdr/meteo/meteoseason/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteoseason_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.meteo.season',  '_sonata_name' => 'admin_gdr_meteo_meteoseason_edit',));
                            }

                            // admin_gdr_meteo_meteoseason_delete
                            if (preg_match('#^/admin/gdr/meteo/meteoseason/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteoseason_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.meteo.season',  '_sonata_name' => 'admin_gdr_meteo_meteoseason_delete',));
                            }

                            // admin_gdr_meteo_meteoseason_show
                            if (preg_match('#^/admin/gdr/meteo/meteoseason/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteoseason_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.meteo.season',  '_sonata_name' => 'admin_gdr_meteo_meteoseason_show',));
                            }

                            // admin_gdr_meteo_meteoseason_export
                            if ($pathinfo === '/admin/gdr/meteo/meteoseason/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.meteo.season',  '_sonata_name' => 'admin_gdr_meteo_meteoseason_export',  '_route' => 'admin_gdr_meteo_meteoseason_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/gdr/meteo/meteocondition')) {
                            // admin_gdr_meteo_meteocondition_list
                            if ($pathinfo === '/admin/gdr/meteo/meteocondition/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.meteo.condition',  '_sonata_name' => 'admin_gdr_meteo_meteocondition_list',  '_route' => 'admin_gdr_meteo_meteocondition_list',);
                            }

                            // admin_gdr_meteo_meteocondition_create
                            if ($pathinfo === '/admin/gdr/meteo/meteocondition/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.meteo.condition',  '_sonata_name' => 'admin_gdr_meteo_meteocondition_create',  '_route' => 'admin_gdr_meteo_meteocondition_create',);
                            }

                            // admin_gdr_meteo_meteocondition_batch
                            if ($pathinfo === '/admin/gdr/meteo/meteocondition/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.meteo.condition',  '_sonata_name' => 'admin_gdr_meteo_meteocondition_batch',  '_route' => 'admin_gdr_meteo_meteocondition_batch',);
                            }

                            // admin_gdr_meteo_meteocondition_edit
                            if (preg_match('#^/admin/gdr/meteo/meteocondition/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteocondition_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.meteo.condition',  '_sonata_name' => 'admin_gdr_meteo_meteocondition_edit',));
                            }

                            // admin_gdr_meteo_meteocondition_delete
                            if (preg_match('#^/admin/gdr/meteo/meteocondition/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteocondition_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.meteo.condition',  '_sonata_name' => 'admin_gdr_meteo_meteocondition_delete',));
                            }

                            // admin_gdr_meteo_meteocondition_show
                            if (preg_match('#^/admin/gdr/meteo/meteocondition/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteocondition_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.meteo.condition',  '_sonata_name' => 'admin_gdr_meteo_meteocondition_show',));
                            }

                            // admin_gdr_meteo_meteocondition_export
                            if ($pathinfo === '/admin/gdr/meteo/meteocondition/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.meteo.condition',  '_sonata_name' => 'admin_gdr_meteo_meteocondition_export',  '_route' => 'admin_gdr_meteo_meteocondition_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/gdr/meteo/meteowind')) {
                            // admin_gdr_meteo_meteowind_list
                            if ($pathinfo === '/admin/gdr/meteo/meteowind/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.meteo.wind',  '_sonata_name' => 'admin_gdr_meteo_meteowind_list',  '_route' => 'admin_gdr_meteo_meteowind_list',);
                            }

                            // admin_gdr_meteo_meteowind_create
                            if ($pathinfo === '/admin/gdr/meteo/meteowind/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.meteo.wind',  '_sonata_name' => 'admin_gdr_meteo_meteowind_create',  '_route' => 'admin_gdr_meteo_meteowind_create',);
                            }

                            // admin_gdr_meteo_meteowind_batch
                            if ($pathinfo === '/admin/gdr/meteo/meteowind/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.meteo.wind',  '_sonata_name' => 'admin_gdr_meteo_meteowind_batch',  '_route' => 'admin_gdr_meteo_meteowind_batch',);
                            }

                            // admin_gdr_meteo_meteowind_edit
                            if (preg_match('#^/admin/gdr/meteo/meteowind/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteowind_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.meteo.wind',  '_sonata_name' => 'admin_gdr_meteo_meteowind_edit',));
                            }

                            // admin_gdr_meteo_meteowind_delete
                            if (preg_match('#^/admin/gdr/meteo/meteowind/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteowind_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.meteo.wind',  '_sonata_name' => 'admin_gdr_meteo_meteowind_delete',));
                            }

                            // admin_gdr_meteo_meteowind_show
                            if (preg_match('#^/admin/gdr/meteo/meteowind/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteowind_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.meteo.wind',  '_sonata_name' => 'admin_gdr_meteo_meteowind_show',));
                            }

                            // admin_gdr_meteo_meteowind_export
                            if ($pathinfo === '/admin/gdr/meteo/meteowind/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.meteo.wind',  '_sonata_name' => 'admin_gdr_meteo_meteowind_export',  '_route' => 'admin_gdr_meteo_meteowind_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/gdr/meteo/meteocombination')) {
                            // admin_gdr_meteo_meteocombination_list
                            if ($pathinfo === '/admin/gdr/meteo/meteocombination/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.meteo.combination',  '_sonata_name' => 'admin_gdr_meteo_meteocombination_list',  '_route' => 'admin_gdr_meteo_meteocombination_list',);
                            }

                            // admin_gdr_meteo_meteocombination_create
                            if ($pathinfo === '/admin/gdr/meteo/meteocombination/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.meteo.combination',  '_sonata_name' => 'admin_gdr_meteo_meteocombination_create',  '_route' => 'admin_gdr_meteo_meteocombination_create',);
                            }

                            // admin_gdr_meteo_meteocombination_batch
                            if ($pathinfo === '/admin/gdr/meteo/meteocombination/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.meteo.combination',  '_sonata_name' => 'admin_gdr_meteo_meteocombination_batch',  '_route' => 'admin_gdr_meteo_meteocombination_batch',);
                            }

                            // admin_gdr_meteo_meteocombination_edit
                            if (preg_match('#^/admin/gdr/meteo/meteocombination/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteocombination_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.meteo.combination',  '_sonata_name' => 'admin_gdr_meteo_meteocombination_edit',));
                            }

                            // admin_gdr_meteo_meteocombination_delete
                            if (preg_match('#^/admin/gdr/meteo/meteocombination/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteocombination_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.meteo.combination',  '_sonata_name' => 'admin_gdr_meteo_meteocombination_delete',));
                            }

                            // admin_gdr_meteo_meteocombination_show
                            if (preg_match('#^/admin/gdr/meteo/meteocombination/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteocombination_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.meteo.combination',  '_sonata_name' => 'admin_gdr_meteo_meteocombination_show',));
                            }

                            // admin_gdr_meteo_meteocombination_export
                            if ($pathinfo === '/admin/gdr/meteo/meteocombination/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.meteo.combination',  '_sonata_name' => 'admin_gdr_meteo_meteocombination_export',  '_route' => 'admin_gdr_meteo_meteocombination_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/gdr/meteo/meteomessage')) {
                            // admin_gdr_meteo_meteomessage_list
                            if ($pathinfo === '/admin/gdr/meteo/meteomessage/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.meteo.message',  '_sonata_name' => 'admin_gdr_meteo_meteomessage_list',  '_route' => 'admin_gdr_meteo_meteomessage_list',);
                            }

                            // admin_gdr_meteo_meteomessage_create
                            if ($pathinfo === '/admin/gdr/meteo/meteomessage/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.meteo.message',  '_sonata_name' => 'admin_gdr_meteo_meteomessage_create',  '_route' => 'admin_gdr_meteo_meteomessage_create',);
                            }

                            // admin_gdr_meteo_meteomessage_batch
                            if ($pathinfo === '/admin/gdr/meteo/meteomessage/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.meteo.message',  '_sonata_name' => 'admin_gdr_meteo_meteomessage_batch',  '_route' => 'admin_gdr_meteo_meteomessage_batch',);
                            }

                            // admin_gdr_meteo_meteomessage_edit
                            if (preg_match('#^/admin/gdr/meteo/meteomessage/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteomessage_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.meteo.message',  '_sonata_name' => 'admin_gdr_meteo_meteomessage_edit',));
                            }

                            // admin_gdr_meteo_meteomessage_delete
                            if (preg_match('#^/admin/gdr/meteo/meteomessage/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteomessage_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.meteo.message',  '_sonata_name' => 'admin_gdr_meteo_meteomessage_delete',));
                            }

                            // admin_gdr_meteo_meteomessage_show
                            if (preg_match('#^/admin/gdr/meteo/meteomessage/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteomessage_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.meteo.message',  '_sonata_name' => 'admin_gdr_meteo_meteomessage_show',));
                            }

                            // admin_gdr_meteo_meteomessage_export
                            if ($pathinfo === '/admin/gdr/meteo/meteomessage/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.meteo.message',  '_sonata_name' => 'admin_gdr_meteo_meteomessage_export',  '_route' => 'admin_gdr_meteo_meteomessage_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/gdr/meteo/meteostatus')) {
                            // admin_gdr_meteo_meteostatus_list
                            if ($pathinfo === '/admin/gdr/meteo/meteostatus/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.meteo.status',  '_sonata_name' => 'admin_gdr_meteo_meteostatus_list',  '_route' => 'admin_gdr_meteo_meteostatus_list',);
                            }

                            // admin_gdr_meteo_meteostatus_create
                            if ($pathinfo === '/admin/gdr/meteo/meteostatus/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.meteo.status',  '_sonata_name' => 'admin_gdr_meteo_meteostatus_create',  '_route' => 'admin_gdr_meteo_meteostatus_create',);
                            }

                            // admin_gdr_meteo_meteostatus_batch
                            if ($pathinfo === '/admin/gdr/meteo/meteostatus/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.meteo.status',  '_sonata_name' => 'admin_gdr_meteo_meteostatus_batch',  '_route' => 'admin_gdr_meteo_meteostatus_batch',);
                            }

                            // admin_gdr_meteo_meteostatus_edit
                            if (preg_match('#^/admin/gdr/meteo/meteostatus/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteostatus_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.meteo.status',  '_sonata_name' => 'admin_gdr_meteo_meteostatus_edit',));
                            }

                            // admin_gdr_meteo_meteostatus_delete
                            if (preg_match('#^/admin/gdr/meteo/meteostatus/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteostatus_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.meteo.status',  '_sonata_name' => 'admin_gdr_meteo_meteostatus_delete',));
                            }

                            // admin_gdr_meteo_meteostatus_show
                            if (preg_match('#^/admin/gdr/meteo/meteostatus/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_meteo_meteostatus_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.meteo.status',  '_sonata_name' => 'admin_gdr_meteo_meteostatus_show',));
                            }

                            // admin_gdr_meteo_meteostatus_export
                            if ($pathinfo === '/admin/gdr/meteo/meteostatus/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.meteo.status',  '_sonata_name' => 'admin_gdr_meteo_meteostatus_export',  '_route' => 'admin_gdr_meteo_meteostatus_export',);
                            }

                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/game')) {
                    if (0 === strpos($pathinfo, '/admin/gdr/game/work')) {
                        // admin_gdr_game_work_list
                        if ($pathinfo === '/admin/gdr/game/work/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.work',  '_sonata_name' => 'admin_gdr_game_work_list',  '_route' => 'admin_gdr_game_work_list',);
                        }

                        // admin_gdr_game_work_create
                        if ($pathinfo === '/admin/gdr/game/work/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.work',  '_sonata_name' => 'admin_gdr_game_work_create',  '_route' => 'admin_gdr_game_work_create',);
                        }

                        // admin_gdr_game_work_batch
                        if ($pathinfo === '/admin/gdr/game/work/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.work',  '_sonata_name' => 'admin_gdr_game_work_batch',  '_route' => 'admin_gdr_game_work_batch',);
                        }

                        // admin_gdr_game_work_edit
                        if (preg_match('#^/admin/gdr/game/work/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_work_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.work',  '_sonata_name' => 'admin_gdr_game_work_edit',));
                        }

                        // admin_gdr_game_work_delete
                        if (preg_match('#^/admin/gdr/game/work/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_work_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.work',  '_sonata_name' => 'admin_gdr_game_work_delete',));
                        }

                        // admin_gdr_game_work_show
                        if (preg_match('#^/admin/gdr/game/work/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_work_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.work',  '_sonata_name' => 'admin_gdr_game_work_show',));
                        }

                        // admin_gdr_game_work_export
                        if ($pathinfo === '/admin/gdr/game/work/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.work',  '_sonata_name' => 'admin_gdr_game_work_export',  '_route' => 'admin_gdr_game_work_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/game/library')) {
                        if (0 === strpos($pathinfo, '/admin/gdr/game/librarysection')) {
                            // admin_gdr_game_librarysection_list
                            if ($pathinfo === '/admin/gdr/game/librarysection/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.biblioteca.sezioni',  '_sonata_name' => 'admin_gdr_game_librarysection_list',  '_route' => 'admin_gdr_game_librarysection_list',);
                            }

                            // admin_gdr_game_librarysection_create
                            if ($pathinfo === '/admin/gdr/game/librarysection/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.biblioteca.sezioni',  '_sonata_name' => 'admin_gdr_game_librarysection_create',  '_route' => 'admin_gdr_game_librarysection_create',);
                            }

                            // admin_gdr_game_librarysection_batch
                            if ($pathinfo === '/admin/gdr/game/librarysection/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.biblioteca.sezioni',  '_sonata_name' => 'admin_gdr_game_librarysection_batch',  '_route' => 'admin_gdr_game_librarysection_batch',);
                            }

                            // admin_gdr_game_librarysection_edit
                            if (preg_match('#^/admin/gdr/game/librarysection/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_librarysection_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.biblioteca.sezioni',  '_sonata_name' => 'admin_gdr_game_librarysection_edit',));
                            }

                            // admin_gdr_game_librarysection_delete
                            if (preg_match('#^/admin/gdr/game/librarysection/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_librarysection_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.biblioteca.sezioni',  '_sonata_name' => 'admin_gdr_game_librarysection_delete',));
                            }

                            // admin_gdr_game_librarysection_show
                            if (preg_match('#^/admin/gdr/game/librarysection/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_librarysection_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.biblioteca.sezioni',  '_sonata_name' => 'admin_gdr_game_librarysection_show',));
                            }

                            // admin_gdr_game_librarysection_export
                            if ($pathinfo === '/admin/gdr/game/librarysection/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.biblioteca.sezioni',  '_sonata_name' => 'admin_gdr_game_librarysection_export',  '_route' => 'admin_gdr_game_librarysection_export',);
                            }

                        }

                        if (0 === strpos($pathinfo, '/admin/gdr/game/librarybook')) {
                            // admin_gdr_game_librarybook_list
                            if ($pathinfo === '/admin/gdr/game/librarybook/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.biblioteca.libri',  '_sonata_name' => 'admin_gdr_game_librarybook_list',  '_route' => 'admin_gdr_game_librarybook_list',);
                            }

                            // admin_gdr_game_librarybook_create
                            if ($pathinfo === '/admin/gdr/game/librarybook/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.biblioteca.libri',  '_sonata_name' => 'admin_gdr_game_librarybook_create',  '_route' => 'admin_gdr_game_librarybook_create',);
                            }

                            // admin_gdr_game_librarybook_batch
                            if ($pathinfo === '/admin/gdr/game/librarybook/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.biblioteca.libri',  '_sonata_name' => 'admin_gdr_game_librarybook_batch',  '_route' => 'admin_gdr_game_librarybook_batch',);
                            }

                            // admin_gdr_game_librarybook_edit
                            if (preg_match('#^/admin/gdr/game/librarybook/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_librarybook_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.biblioteca.libri',  '_sonata_name' => 'admin_gdr_game_librarybook_edit',));
                            }

                            // admin_gdr_game_librarybook_delete
                            if (preg_match('#^/admin/gdr/game/librarybook/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_librarybook_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.biblioteca.libri',  '_sonata_name' => 'admin_gdr_game_librarybook_delete',));
                            }

                            // admin_gdr_game_librarybook_show
                            if (preg_match('#^/admin/gdr/game/librarybook/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_librarybook_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.biblioteca.libri',  '_sonata_name' => 'admin_gdr_game_librarybook_show',));
                            }

                            // admin_gdr_game_librarybook_export
                            if ($pathinfo === '/admin/gdr/game/librarybook/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.biblioteca.libri',  '_sonata_name' => 'admin_gdr_game_librarybook_export',  '_route' => 'admin_gdr_game_librarybook_export',);
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/game/manuale')) {
                        // admin_gdr_game_manuale_list
                        if ($pathinfo === '/admin/gdr/game/manuale/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.manuale',  '_sonata_name' => 'admin_gdr_game_manuale_list',  '_route' => 'admin_gdr_game_manuale_list',);
                        }

                        // admin_gdr_game_manuale_create
                        if ($pathinfo === '/admin/gdr/game/manuale/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.manuale',  '_sonata_name' => 'admin_gdr_game_manuale_create',  '_route' => 'admin_gdr_game_manuale_create',);
                        }

                        // admin_gdr_game_manuale_batch
                        if ($pathinfo === '/admin/gdr/game/manuale/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.manuale',  '_sonata_name' => 'admin_gdr_game_manuale_batch',  '_route' => 'admin_gdr_game_manuale_batch',);
                        }

                        // admin_gdr_game_manuale_edit
                        if (preg_match('#^/admin/gdr/game/manuale/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_manuale_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.manuale',  '_sonata_name' => 'admin_gdr_game_manuale_edit',));
                        }

                        // admin_gdr_game_manuale_delete
                        if (preg_match('#^/admin/gdr/game/manuale/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_manuale_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.manuale',  '_sonata_name' => 'admin_gdr_game_manuale_delete',));
                        }

                        // admin_gdr_game_manuale_show
                        if (preg_match('#^/admin/gdr/game/manuale/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_manuale_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.manuale',  '_sonata_name' => 'admin_gdr_game_manuale_show',));
                        }

                        // admin_gdr_game_manuale_export
                        if ($pathinfo === '/admin/gdr/game/manuale/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.manuale',  '_sonata_name' => 'admin_gdr_game_manuale_export',  '_route' => 'admin_gdr_game_manuale_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/game/editto')) {
                        // admin_gdr_game_editto_list
                        if ($pathinfo === '/admin/gdr/game/editto/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.editto',  '_sonata_name' => 'admin_gdr_game_editto_list',  '_route' => 'admin_gdr_game_editto_list',);
                        }

                        // admin_gdr_game_editto_create
                        if ($pathinfo === '/admin/gdr/game/editto/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.editto',  '_sonata_name' => 'admin_gdr_game_editto_create',  '_route' => 'admin_gdr_game_editto_create',);
                        }

                        // admin_gdr_game_editto_batch
                        if ($pathinfo === '/admin/gdr/game/editto/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.editto',  '_sonata_name' => 'admin_gdr_game_editto_batch',  '_route' => 'admin_gdr_game_editto_batch',);
                        }

                        // admin_gdr_game_editto_edit
                        if (preg_match('#^/admin/gdr/game/editto/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_editto_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.editto',  '_sonata_name' => 'admin_gdr_game_editto_edit',));
                        }

                        // admin_gdr_game_editto_delete
                        if (preg_match('#^/admin/gdr/game/editto/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_editto_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.editto',  '_sonata_name' => 'admin_gdr_game_editto_delete',));
                        }

                        // admin_gdr_game_editto_show
                        if (preg_match('#^/admin/gdr/game/editto/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_editto_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.editto',  '_sonata_name' => 'admin_gdr_game_editto_show',));
                        }

                        // admin_gdr_game_editto_export
                        if ($pathinfo === '/admin/gdr/game/editto/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.editto',  '_sonata_name' => 'admin_gdr_game_editto_export',  '_route' => 'admin_gdr_game_editto_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/game/location')) {
                        // admin_gdr_game_location_list
                        if ($pathinfo === '/admin/gdr/game/location/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.location',  '_sonata_name' => 'admin_gdr_game_location_list',  '_route' => 'admin_gdr_game_location_list',);
                        }

                        // admin_gdr_game_location_create
                        if ($pathinfo === '/admin/gdr/game/location/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.location',  '_sonata_name' => 'admin_gdr_game_location_create',  '_route' => 'admin_gdr_game_location_create',);
                        }

                        // admin_gdr_game_location_batch
                        if ($pathinfo === '/admin/gdr/game/location/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.location',  '_sonata_name' => 'admin_gdr_game_location_batch',  '_route' => 'admin_gdr_game_location_batch',);
                        }

                        // admin_gdr_game_location_edit
                        if (preg_match('#^/admin/gdr/game/location/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_location_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.location',  '_sonata_name' => 'admin_gdr_game_location_edit',));
                        }

                        // admin_gdr_game_location_delete
                        if (preg_match('#^/admin/gdr/game/location/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_location_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.location',  '_sonata_name' => 'admin_gdr_game_location_delete',));
                        }

                        // admin_gdr_game_location_show
                        if (preg_match('#^/admin/gdr/game/location/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_location_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.location',  '_sonata_name' => 'admin_gdr_game_location_show',));
                        }

                        // admin_gdr_game_location_export
                        if ($pathinfo === '/admin/gdr/game/location/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.location',  '_sonata_name' => 'admin_gdr_game_location_export',  '_route' => 'admin_gdr_game_location_export',);
                        }

                        if (0 === strpos($pathinfo, '/admin/gdr/game/locationimage')) {
                            // admin_gdr_game_locationimage_list
                            if ($pathinfo === '/admin/gdr/game/locationimage/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.location.image',  '_sonata_name' => 'admin_gdr_game_locationimage_list',  '_route' => 'admin_gdr_game_locationimage_list',);
                            }

                            // admin_gdr_game_locationimage_create
                            if ($pathinfo === '/admin/gdr/game/locationimage/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.location.image',  '_sonata_name' => 'admin_gdr_game_locationimage_create',  '_route' => 'admin_gdr_game_locationimage_create',);
                            }

                            // admin_gdr_game_locationimage_batch
                            if ($pathinfo === '/admin/gdr/game/locationimage/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.location.image',  '_sonata_name' => 'admin_gdr_game_locationimage_batch',  '_route' => 'admin_gdr_game_locationimage_batch',);
                            }

                            // admin_gdr_game_locationimage_edit
                            if (preg_match('#^/admin/gdr/game/locationimage/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_locationimage_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.location.image',  '_sonata_name' => 'admin_gdr_game_locationimage_edit',));
                            }

                            // admin_gdr_game_locationimage_delete
                            if (preg_match('#^/admin/gdr/game/locationimage/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_locationimage_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.location.image',  '_sonata_name' => 'admin_gdr_game_locationimage_delete',));
                            }

                            // admin_gdr_game_locationimage_show
                            if (preg_match('#^/admin/gdr/game/locationimage/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_locationimage_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.location.image',  '_sonata_name' => 'admin_gdr_game_locationimage_show',));
                            }

                            // admin_gdr_game_locationimage_export
                            if ($pathinfo === '/admin/gdr/game/locationimage/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.location.image',  '_sonata_name' => 'admin_gdr_game_locationimage_export',  '_route' => 'admin_gdr_game_locationimage_export',);
                            }

                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/game/tagchat')) {
                        // admin_gdr_game_tagchat_list
                        if ($pathinfo === '/admin/gdr/game/tagchat/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.location.tag',  '_sonata_name' => 'admin_gdr_game_tagchat_list',  '_route' => 'admin_gdr_game_tagchat_list',);
                        }

                        // admin_gdr_game_tagchat_create
                        if ($pathinfo === '/admin/gdr/game/tagchat/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.location.tag',  '_sonata_name' => 'admin_gdr_game_tagchat_create',  '_route' => 'admin_gdr_game_tagchat_create',);
                        }

                        // admin_gdr_game_tagchat_batch
                        if ($pathinfo === '/admin/gdr/game/tagchat/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.location.tag',  '_sonata_name' => 'admin_gdr_game_tagchat_batch',  '_route' => 'admin_gdr_game_tagchat_batch',);
                        }

                        // admin_gdr_game_tagchat_edit
                        if (preg_match('#^/admin/gdr/game/tagchat/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_tagchat_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.location.tag',  '_sonata_name' => 'admin_gdr_game_tagchat_edit',));
                        }

                        // admin_gdr_game_tagchat_delete
                        if (preg_match('#^/admin/gdr/game/tagchat/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_tagchat_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.location.tag',  '_sonata_name' => 'admin_gdr_game_tagchat_delete',));
                        }

                        // admin_gdr_game_tagchat_show
                        if (preg_match('#^/admin/gdr/game/tagchat/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_tagchat_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.location.tag',  '_sonata_name' => 'admin_gdr_game_tagchat_show',));
                        }

                        // admin_gdr_game_tagchat_export
                        if ($pathinfo === '/admin/gdr/game/tagchat/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.location.tag',  '_sonata_name' => 'admin_gdr_game_tagchat_export',  '_route' => 'admin_gdr_game_tagchat_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/game/letter')) {
                        // admin_gdr_game_letter_list
                        if ($pathinfo === '/admin/gdr/game/letter/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.letter',  '_sonata_name' => 'admin_gdr_game_letter_list',  '_route' => 'admin_gdr_game_letter_list',);
                        }

                        // admin_gdr_game_letter_create
                        if ($pathinfo === '/admin/gdr/game/letter/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.letter',  '_sonata_name' => 'admin_gdr_game_letter_create',  '_route' => 'admin_gdr_game_letter_create',);
                        }

                        // admin_gdr_game_letter_batch
                        if ($pathinfo === '/admin/gdr/game/letter/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.letter',  '_sonata_name' => 'admin_gdr_game_letter_batch',  '_route' => 'admin_gdr_game_letter_batch',);
                        }

                        // admin_gdr_game_letter_edit
                        if (preg_match('#^/admin/gdr/game/letter/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_letter_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.letter',  '_sonata_name' => 'admin_gdr_game_letter_edit',));
                        }

                        // admin_gdr_game_letter_delete
                        if (preg_match('#^/admin/gdr/game/letter/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_letter_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.letter',  '_sonata_name' => 'admin_gdr_game_letter_delete',));
                        }

                        // admin_gdr_game_letter_show
                        if (preg_match('#^/admin/gdr/game/letter/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_letter_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.letter',  '_sonata_name' => 'admin_gdr_game_letter_show',));
                        }

                        // admin_gdr_game_letter_export
                        if ($pathinfo === '/admin/gdr/game/letter/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.letter',  '_sonata_name' => 'admin_gdr_game_letter_export',  '_route' => 'admin_gdr_game_letter_export',);
                        }

                        if (0 === strpos($pathinfo, '/admin/gdr/game/letterbackground')) {
                            // admin_gdr_game_letterbackground_list
                            if ($pathinfo === '/admin/gdr/game/letterbackground/list') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.letter.background',  '_sonata_name' => 'admin_gdr_game_letterbackground_list',  '_route' => 'admin_gdr_game_letterbackground_list',);
                            }

                            // admin_gdr_game_letterbackground_create
                            if ($pathinfo === '/admin/gdr/game/letterbackground/create') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.letter.background',  '_sonata_name' => 'admin_gdr_game_letterbackground_create',  '_route' => 'admin_gdr_game_letterbackground_create',);
                            }

                            // admin_gdr_game_letterbackground_batch
                            if ($pathinfo === '/admin/gdr/game/letterbackground/batch') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.letter.background',  '_sonata_name' => 'admin_gdr_game_letterbackground_batch',  '_route' => 'admin_gdr_game_letterbackground_batch',);
                            }

                            // admin_gdr_game_letterbackground_edit
                            if (preg_match('#^/admin/gdr/game/letterbackground/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_letterbackground_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.letter.background',  '_sonata_name' => 'admin_gdr_game_letterbackground_edit',));
                            }

                            // admin_gdr_game_letterbackground_delete
                            if (preg_match('#^/admin/gdr/game/letterbackground/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_letterbackground_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.letter.background',  '_sonata_name' => 'admin_gdr_game_letterbackground_delete',));
                            }

                            // admin_gdr_game_letterbackground_show
                            if (preg_match('#^/admin/gdr/game/letterbackground/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                                return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_letterbackground_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.letter.background',  '_sonata_name' => 'admin_gdr_game_letterbackground_show',));
                            }

                            // admin_gdr_game_letterbackground_export
                            if ($pathinfo === '/admin/gdr/game/letterbackground/export') {
                                return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.letter.background',  '_sonata_name' => 'admin_gdr_game_letterbackground_export',  '_route' => 'admin_gdr_game_letterbackground_export',);
                            }

                        }

                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/user/gravestone')) {
                    // admin_gdr_user_gravestone_list
                    if ($pathinfo === '/admin/gdr/user/gravestone/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.gravestone',  '_sonata_name' => 'admin_gdr_user_gravestone_list',  '_route' => 'admin_gdr_user_gravestone_list',);
                    }

                    // admin_gdr_user_gravestone_create
                    if ($pathinfo === '/admin/gdr/user/gravestone/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.gravestone',  '_sonata_name' => 'admin_gdr_user_gravestone_create',  '_route' => 'admin_gdr_user_gravestone_create',);
                    }

                    // admin_gdr_user_gravestone_batch
                    if ($pathinfo === '/admin/gdr/user/gravestone/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.gravestone',  '_sonata_name' => 'admin_gdr_user_gravestone_batch',  '_route' => 'admin_gdr_user_gravestone_batch',);
                    }

                    // admin_gdr_user_gravestone_edit
                    if (preg_match('#^/admin/gdr/user/gravestone/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_gravestone_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.gravestone',  '_sonata_name' => 'admin_gdr_user_gravestone_edit',));
                    }

                    // admin_gdr_user_gravestone_delete
                    if (preg_match('#^/admin/gdr/user/gravestone/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_gravestone_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.gravestone',  '_sonata_name' => 'admin_gdr_user_gravestone_delete',));
                    }

                    // admin_gdr_user_gravestone_show
                    if (preg_match('#^/admin/gdr/user/gravestone/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_user_gravestone_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.gravestone',  '_sonata_name' => 'admin_gdr_user_gravestone_show',));
                    }

                    // admin_gdr_user_gravestone_export
                    if ($pathinfo === '/admin/gdr/user/gravestone/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.gravestone',  '_sonata_name' => 'admin_gdr_user_gravestone_export',  '_route' => 'admin_gdr_user_gravestone_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/administration/upload')) {
                    // admin_gdr_administration_upload_list
                    if ($pathinfo === '/admin/gdr/administration/upload/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.upload',  '_sonata_name' => 'admin_gdr_administration_upload_list',  '_route' => 'admin_gdr_administration_upload_list',);
                    }

                    // admin_gdr_administration_upload_create
                    if ($pathinfo === '/admin/gdr/administration/upload/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.upload',  '_sonata_name' => 'admin_gdr_administration_upload_create',  '_route' => 'admin_gdr_administration_upload_create',);
                    }

                    // admin_gdr_administration_upload_batch
                    if ($pathinfo === '/admin/gdr/administration/upload/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.upload',  '_sonata_name' => 'admin_gdr_administration_upload_batch',  '_route' => 'admin_gdr_administration_upload_batch',);
                    }

                    // admin_gdr_administration_upload_edit
                    if (preg_match('#^/admin/gdr/administration/upload/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_administration_upload_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.upload',  '_sonata_name' => 'admin_gdr_administration_upload_edit',));
                    }

                    // admin_gdr_administration_upload_delete
                    if (preg_match('#^/admin/gdr/administration/upload/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_administration_upload_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.upload',  '_sonata_name' => 'admin_gdr_administration_upload_delete',));
                    }

                    // admin_gdr_administration_upload_show
                    if (preg_match('#^/admin/gdr/administration/upload/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_administration_upload_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.upload',  '_sonata_name' => 'admin_gdr_administration_upload_show',));
                    }

                    // admin_gdr_administration_upload_export
                    if ($pathinfo === '/admin/gdr/administration/upload/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.upload',  '_sonata_name' => 'admin_gdr_administration_upload_export',  '_route' => 'admin_gdr_administration_upload_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/game/marque')) {
                    // admin_gdr_game_marque_list
                    if ($pathinfo === '/admin/gdr/game/marque/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.marque',  '_sonata_name' => 'admin_gdr_game_marque_list',  '_route' => 'admin_gdr_game_marque_list',);
                    }

                    // admin_gdr_game_marque_create
                    if ($pathinfo === '/admin/gdr/game/marque/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.marque',  '_sonata_name' => 'admin_gdr_game_marque_create',  '_route' => 'admin_gdr_game_marque_create',);
                    }

                    // admin_gdr_game_marque_batch
                    if ($pathinfo === '/admin/gdr/game/marque/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.marque',  '_sonata_name' => 'admin_gdr_game_marque_batch',  '_route' => 'admin_gdr_game_marque_batch',);
                    }

                    // admin_gdr_game_marque_edit
                    if (preg_match('#^/admin/gdr/game/marque/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_marque_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.marque',  '_sonata_name' => 'admin_gdr_game_marque_edit',));
                    }

                    // admin_gdr_game_marque_delete
                    if (preg_match('#^/admin/gdr/game/marque/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_marque_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.marque',  '_sonata_name' => 'admin_gdr_game_marque_delete',));
                    }

                    // admin_gdr_game_marque_show
                    if (preg_match('#^/admin/gdr/game/marque/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_marque_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.marque',  '_sonata_name' => 'admin_gdr_game_marque_show',));
                    }

                    // admin_gdr_game_marque_export
                    if ($pathinfo === '/admin/gdr/game/marque/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.marque',  '_sonata_name' => 'admin_gdr_game_marque_export',  '_route' => 'admin_gdr_game_marque_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/administration/news')) {
                    // admin_gdr_administration_news_list
                    if ($pathinfo === '/admin/gdr/administration/news/list') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.news',  '_sonata_name' => 'admin_gdr_administration_news_list',  '_route' => 'admin_gdr_administration_news_list',);
                    }

                    // admin_gdr_administration_news_create
                    if ($pathinfo === '/admin/gdr/administration/news/create') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.news',  '_sonata_name' => 'admin_gdr_administration_news_create',  '_route' => 'admin_gdr_administration_news_create',);
                    }

                    // admin_gdr_administration_news_batch
                    if ($pathinfo === '/admin/gdr/administration/news/batch') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.news',  '_sonata_name' => 'admin_gdr_administration_news_batch',  '_route' => 'admin_gdr_administration_news_batch',);
                    }

                    // admin_gdr_administration_news_edit
                    if (preg_match('#^/admin/gdr/administration/news/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_administration_news_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.news',  '_sonata_name' => 'admin_gdr_administration_news_edit',));
                    }

                    // admin_gdr_administration_news_delete
                    if (preg_match('#^/admin/gdr/administration/news/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_administration_news_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.news',  '_sonata_name' => 'admin_gdr_administration_news_delete',));
                    }

                    // admin_gdr_administration_news_show
                    if (preg_match('#^/admin/gdr/administration/news/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_administration_news_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.news',  '_sonata_name' => 'admin_gdr_administration_news_show',));
                    }

                    // admin_gdr_administration_news_export
                    if ($pathinfo === '/admin/gdr/administration/news/export') {
                        return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.news',  '_sonata_name' => 'admin_gdr_administration_news_export',  '_route' => 'admin_gdr_administration_news_export',);
                    }

                }

                if (0 === strpos($pathinfo, '/admin/gdr/game/wise-wise')) {
                    if (0 === strpos($pathinfo, '/admin/gdr/game/wise-wisesentence')) {
                        // admin_gdr_game_wise_wisesentence_list
                        if ($pathinfo === '/admin/gdr/game/wise-wisesentence/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.wise.sentence',  '_sonata_name' => 'admin_gdr_game_wise_wisesentence_list',  '_route' => 'admin_gdr_game_wise_wisesentence_list',);
                        }

                        // admin_gdr_game_wise_wisesentence_create
                        if ($pathinfo === '/admin/gdr/game/wise-wisesentence/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.wise.sentence',  '_sonata_name' => 'admin_gdr_game_wise_wisesentence_create',  '_route' => 'admin_gdr_game_wise_wisesentence_create',);
                        }

                        // admin_gdr_game_wise_wisesentence_batch
                        if ($pathinfo === '/admin/gdr/game/wise-wisesentence/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.wise.sentence',  '_sonata_name' => 'admin_gdr_game_wise_wisesentence_batch',  '_route' => 'admin_gdr_game_wise_wisesentence_batch',);
                        }

                        // admin_gdr_game_wise_wisesentence_edit
                        if (preg_match('#^/admin/gdr/game/wise\\-wisesentence/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_wise_wisesentence_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.wise.sentence',  '_sonata_name' => 'admin_gdr_game_wise_wisesentence_edit',));
                        }

                        // admin_gdr_game_wise_wisesentence_delete
                        if (preg_match('#^/admin/gdr/game/wise\\-wisesentence/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_wise_wisesentence_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.wise.sentence',  '_sonata_name' => 'admin_gdr_game_wise_wisesentence_delete',));
                        }

                        // admin_gdr_game_wise_wisesentence_show
                        if (preg_match('#^/admin/gdr/game/wise\\-wisesentence/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_wise_wisesentence_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.wise.sentence',  '_sonata_name' => 'admin_gdr_game_wise_wisesentence_show',));
                        }

                        // admin_gdr_game_wise_wisesentence_export
                        if ($pathinfo === '/admin/gdr/game/wise-wisesentence/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.wise.sentence',  '_sonata_name' => 'admin_gdr_game_wise_wisesentence_export',  '_route' => 'admin_gdr_game_wise_wisesentence_export',);
                        }

                    }

                    if (0 === strpos($pathinfo, '/admin/gdr/game/wise-wisetag')) {
                        // admin_gdr_game_wise_wisetag_list
                        if ($pathinfo === '/admin/gdr/game/wise-wisetag/list') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::listAction',  '_sonata_admin' => 'sonata.admin.wise.tag',  '_sonata_name' => 'admin_gdr_game_wise_wisetag_list',  '_route' => 'admin_gdr_game_wise_wisetag_list',);
                        }

                        // admin_gdr_game_wise_wisetag_create
                        if ($pathinfo === '/admin/gdr/game/wise-wisetag/create') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::createAction',  '_sonata_admin' => 'sonata.admin.wise.tag',  '_sonata_name' => 'admin_gdr_game_wise_wisetag_create',  '_route' => 'admin_gdr_game_wise_wisetag_create',);
                        }

                        // admin_gdr_game_wise_wisetag_batch
                        if ($pathinfo === '/admin/gdr/game/wise-wisetag/batch') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::batchAction',  '_sonata_admin' => 'sonata.admin.wise.tag',  '_sonata_name' => 'admin_gdr_game_wise_wisetag_batch',  '_route' => 'admin_gdr_game_wise_wisetag_batch',);
                        }

                        // admin_gdr_game_wise_wisetag_edit
                        if (preg_match('#^/admin/gdr/game/wise\\-wisetag/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_wise_wisetag_edit')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::editAction',  '_sonata_admin' => 'sonata.admin.wise.tag',  '_sonata_name' => 'admin_gdr_game_wise_wisetag_edit',));
                        }

                        // admin_gdr_game_wise_wisetag_delete
                        if (preg_match('#^/admin/gdr/game/wise\\-wisetag/(?P<id>[^/]++)/delete$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_wise_wisetag_delete')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::deleteAction',  '_sonata_admin' => 'sonata.admin.wise.tag',  '_sonata_name' => 'admin_gdr_game_wise_wisetag_delete',));
                        }

                        // admin_gdr_game_wise_wisetag_show
                        if (preg_match('#^/admin/gdr/game/wise\\-wisetag/(?P<id>[^/]++)/show$#s', $pathinfo, $matches)) {
                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'admin_gdr_game_wise_wisetag_show')), array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::showAction',  '_sonata_admin' => 'sonata.admin.wise.tag',  '_sonata_name' => 'admin_gdr_game_wise_wisetag_show',));
                        }

                        // admin_gdr_game_wise_wisetag_export
                        if ($pathinfo === '/admin/gdr/game/wise-wisetag/export') {
                            return array (  '_controller' => 'Sonata\\AdminBundle\\Controller\\CRUDController::exportAction',  '_sonata_admin' => 'sonata.admin.wise.tag',  '_sonata_name' => 'admin_gdr_game_wise_wisetag_export',  '_route' => 'admin_gdr_game_wise_wisetag_export',);
                        }

                    }

                }

            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

        }

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
