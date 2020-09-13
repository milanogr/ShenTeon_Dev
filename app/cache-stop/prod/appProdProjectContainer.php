<?php
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InactiveScopeException;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
class appProdProjectContainer extends Container
{
    private $parameters;
    private $targetDirs = array();
    public function __construct()
    {
        $dir = __DIR__;
        for ($i = 1; $i <= 5; ++$i) {
            $this->targetDirs[$i] = $dir = dirname($dir);
        }
        $this->parameters = $this->getDefaultParameters();
        $this->services =
        $this->scopedServices =
        $this->scopeStacks = array();
        $this->scopes = array('request' => 'container');
        $this->scopeChildren = array('request' => array());
        $this->methodMap = array(
            'annotation_reader' => 'getAnnotationReaderService',
            'assetic.asset_factory' => 'getAssetic_AssetFactoryService',
            'assetic.asset_manager' => 'getAssetic_AssetManagerService',
            'assetic.filter.cssrewrite' => 'getAssetic_Filter_CssrewriteService',
            'assetic.filter.uglifycss' => 'getAssetic_Filter_UglifycssService',
            'assetic.filter.uglifyjs2' => 'getAssetic_Filter_Uglifyjs2Service',
            'assetic.filter_manager' => 'getAssetic_FilterManagerService',
            'assets._version__default' => 'getAssets_VersionDefaultService',
            'assets.context' => 'getAssets_ContextService',
            'assets.packages' => 'getAssets_PackagesService',
            'authentication_handler' => 'getAuthenticationHandlerService',
            'cache_clearer' => 'getCacheClearerService',
            'cache_warmer' => 'getCacheWarmerService',
            'config_cache_factory' => 'getConfigCacheFactoryService',
            'controller_name_converter' => 'getControllerNameConverterService',
            'debug.debug_handlers_listener' => 'getDebug_DebugHandlersListenerService',
            'debug.stopwatch' => 'getDebug_StopwatchService',
            'doctrine' => 'getDoctrineService',
            'doctrine.dbal.connection_factory' => 'getDoctrine_Dbal_ConnectionFactoryService',
            'doctrine.dbal.default_connection' => 'getDoctrine_Dbal_DefaultConnectionService',
            'doctrine.orm.default_entity_listener_resolver' => 'getDoctrine_Orm_DefaultEntityListenerResolverService',
            'doctrine.orm.default_entity_manager' => 'getDoctrine_Orm_DefaultEntityManagerService',
            'doctrine.orm.default_listeners.attach_entity_listeners' => 'getDoctrine_Orm_DefaultListeners_AttachEntityListenersService',
            'doctrine.orm.default_manager_configurator' => 'getDoctrine_Orm_DefaultManagerConfiguratorService',
            'doctrine.orm.validator.unique' => 'getDoctrine_Orm_Validator_UniqueService',
            'doctrine.orm.validator_initializer' => 'getDoctrine_Orm_ValidatorInitializerService',
            'doctrine_cache.providers.delex_apc' => 'getDoctrineCache_Providers_DelexApcService',
            'event_dispatcher' => 'getEventDispatcherService',
            'exercise_html_purifier.cache_warmer.serializer' => 'getExerciseHtmlPurifier_CacheWarmer_SerializerService',
            'exercise_html_purifier.config.custom' => 'getExerciseHtmlPurifier_Config_CustomService',
            'exercise_html_purifier.config.default' => 'getExerciseHtmlPurifier_Config_DefaultService',
            'exercise_html_purifier.custom' => 'getExerciseHtmlPurifier_CustomService',
            'exercise_html_purifier.default' => 'getExerciseHtmlPurifier_DefaultService',
            'exercise_html_purifier.twig_extension' => 'getExerciseHtmlPurifier_TwigExtensionService',
            'file_locator' => 'getFileLocatorService',
            'filesystem' => 'getFilesystemService',
            'form.csrf_provider' => 'getForm_CsrfProviderService',
            'form.factory' => 'getForm_FactoryService',
            'form.registry' => 'getForm_RegistryService',
            'form.resolved_type_factory' => 'getForm_ResolvedTypeFactoryService',
            'form.type.birthday' => 'getForm_Type_BirthdayService',
            'form.type.button' => 'getForm_Type_ButtonService',
            'form.type.checkbox' => 'getForm_Type_CheckboxService',
            'form.type.choice' => 'getForm_Type_ChoiceService',
            'form.type.collection' => 'getForm_Type_CollectionService',
            'form.type.country' => 'getForm_Type_CountryService',
            'form.type.currency' => 'getForm_Type_CurrencyService',
            'form.type.date' => 'getForm_Type_DateService',
            'form.type.datetime' => 'getForm_Type_DatetimeService',
            'form.type.email' => 'getForm_Type_EmailService',
            'form.type.entity' => 'getForm_Type_EntityService',
            'form.type.file' => 'getForm_Type_FileService',
            'form.type.form' => 'getForm_Type_FormService',
            'form.type.hidden' => 'getForm_Type_HiddenService',
            'form.type.integer' => 'getForm_Type_IntegerService',
            'form.type.language' => 'getForm_Type_LanguageService',
            'form.type.locale' => 'getForm_Type_LocaleService',
            'form.type.money' => 'getForm_Type_MoneyService',
            'form.type.number' => 'getForm_Type_NumberService',
            'form.type.password' => 'getForm_Type_PasswordService',
            'form.type.percent' => 'getForm_Type_PercentService',
            'form.type.radio' => 'getForm_Type_RadioService',
            'form.type.range' => 'getForm_Type_RangeService',
            'form.type.repeated' => 'getForm_Type_RepeatedService',
            'form.type.reset' => 'getForm_Type_ResetService',
            'form.type.search' => 'getForm_Type_SearchService',
            'form.type.submit' => 'getForm_Type_SubmitService',
            'form.type.text' => 'getForm_Type_TextService',
            'form.type.textarea' => 'getForm_Type_TextareaService',
            'form.type.time' => 'getForm_Type_TimeService',
            'form.type.timezone' => 'getForm_Type_TimezoneService',
            'form.type.url' => 'getForm_Type_UrlService',
            'form.type_extension.csrf' => 'getForm_TypeExtension_CsrfService',
            'form.type_extension.form.http_foundation' => 'getForm_TypeExtension_Form_HttpFoundationService',
            'form.type_extension.form.validator' => 'getForm_TypeExtension_Form_ValidatorService',
            'form.type_extension.repeated.validator' => 'getForm_TypeExtension_Repeated_ValidatorService',
            'form.type_extension.submit.validator' => 'getForm_TypeExtension_Submit_ValidatorService',
            'form.type_guesser.doctrine' => 'getForm_TypeGuesser_DoctrineService',
            'form.type_guesser.validator' => 'getForm_TypeGuesser_ValidatorService',
            'fos_js_routing.controller' => 'getFosJsRouting_ControllerService',
            'fos_js_routing.extractor' => 'getFosJsRouting_ExtractorService',
            'fos_js_routing.serializer' => 'getFosJsRouting_SerializerService',
            'fragment.handler' => 'getFragment_HandlerService',
            'fragment.listener' => 'getFragment_ListenerService',
            'fragment.renderer.esi' => 'getFragment_Renderer_EsiService',
            'fragment.renderer.hinclude' => 'getFragment_Renderer_HincludeService',
            'fragment.renderer.inline' => 'getFragment_Renderer_InlineService',
            'fragment.renderer.ssi' => 'getFragment_Renderer_SsiService',
            'gdr.banklogger' => 'getGdr_BankloggerService',
            'gdr.combat' => 'getGdr_CombatService',
            'gdr.dom.document' => 'getGdr_Dom_DocumentService',
            'gdr.erario' => 'getGdr_ErarioService',
            'gdr.forum' => 'getGdr_ForumService',
            'gdr.game.player.killer' => 'getGdr_Game_Player_KillerService',
            'gdr.game.player.killer.age' => 'getGdr_Game_Player_Killer_AgeService',
            'gdr.game.player.killer.notify_killed_randomly' => 'getGdr_Game_Player_Killer_NotifyKilledRandomlyService',
            'gdr.game.player.killer.randomly' => 'getGdr_Game_Player_Killer_RandomlyService',
            'gdr.game.player.killer.suicide' => 'getGdr_Game_Player_Killer_SuicideService',
            'gdr.game.random_death' => 'getGdr_Game_RandomDeathService',
            'gdr.game.utils.chance_generator' => 'getGdr_Game_Utils_ChanceGeneratorService',
            'gdr.game.utils.text_purifier' => 'getGdr_Game_Utils_TextPurifierService',
            'gdr.game_bundle.form.type.name_selector_type' => 'getGdr_GameBundle_Form_Type_NameSelectorTypeService',
            'gdr.game_bundle.general' => 'getGdr_GameBundle_GeneralService',
            'gdr.game_bundle.listener.doctrine_updater_listener' => 'getGdr_GameBundle_Listener_DoctrineUpdaterListenerService',
            'gdr.game_bundle.twig.chat_extension' => 'getGdr_GameBundle_Twig_ChatExtensionService',
            'gdr.game_bundle.twig.combat_extension' => 'getGdr_GameBundle_Twig_CombatExtensionService',
            'gdr.game_bundle.twig.path_extension' => 'getGdr_GameBundle_Twig_PathExtensionService',
            'gdr.game_bundle.twig.race_chat_extension' => 'getGdr_GameBundle_Twig_RaceChatExtensionService',
            'gdr.game_bundle.twig.teon_date_extension' => 'getGdr_GameBundle_Twig_TeonDateExtensionService',
            'gdr.game_bundle.twig.text_extension' => 'getGdr_GameBundle_Twig_TextExtensionService',
            'gdr.game_bundle.validator.constraint.clan_free_validator' => 'getGdr_GameBundle_Validator_Constraint_ClanFreeValidatorService',
            'gdr.game_bundle.validator.constraint.death_free_validator' => 'getGdr_GameBundle_Validator_Constraint_DeathFreeValidatorService',
            'gdr.game_bundle.validator.constraint.enclave_free_validator' => 'getGdr_GameBundle_Validator_Constraint_EnclaveFreeValidatorService',
            'gdr.game_bundle.validator.constraint.enough_money_validator' => 'getGdr_GameBundle_Validator_Constraint_EnoughMoneyValidatorService',
            'gdr.game_bundle.validator.constraint.life_free_validator' => 'getGdr_GameBundle_Validator_Constraint_LifeFreeValidatorService',
            'gdr.game_bundle.validator.constraint.no_married_validator' => 'getGdr_GameBundle_Validator_Constraint_NoMarriedValidatorService',
            'gdr.game_bundle.validator.constraint.not_banned_validator' => 'getGdr_GameBundle_Validator_Constraint_NotBannedValidatorService',
            'gdr.game_bundle.validator.constraint.valid_username_validator' => 'getGdr_GameBundle_Validator_Constraint_ValidUsernameValidatorService',
            'gdr.item.service' => 'getGdr_Item_ServiceService',
            'gdr.letter' => 'getGdr_LetterService',
            'gdr.logs.cron' => 'getGdr_Logs_CronService',
            'gdr.meteo.generator' => 'getGdr_Meteo_GeneratorService',
            'gdr.notifier.letter' => 'getGdr_Notifier_LetterService',
            'gdr.permission' => 'getGdr_PermissionService',
            'gdr.personage' => 'getGdr_PersonageService',
            'gdr.player.notify_random_skill' => 'getGdr_Player_NotifyRandomSkillService',
            'gdr.player.skill.random' => 'getGdr_Player_Skill_RandomService',
            'gdr.player.skiller' => 'getGdr_Player_SkillerService',
            'gdr.race.service' => 'getGdr_Race_ServiceService',
            'gdr.referrer' => 'getGdr_ReferrerService',
            'gdr.trading' => 'getGdr_TradingService',
            'gdr.user_bundle.validator.constraint.chars_username_validator' => 'getGdr_UserBundle_Validator_Constraint_CharsUsernameValidatorService',
            'gdr.user_bundle.validator.constraint.usable_username_validator' => 'getGdr_UserBundle_Validator_Constraint_UsableUsernameValidatorService',
            'gdr_administration.form.type.admin_file' => 'getGdrAdministration_Form_Type_AdminFileService',
            'http_kernel' => 'getHttpKernelService',
            'ivory_ck_editor.config_manager' => 'getIvoryCkEditor_ConfigManagerService',
            'ivory_ck_editor.form.type' => 'getIvoryCkEditor_Form_TypeService',
            'ivory_ck_editor.helper.assets_version_trimer' => 'getIvoryCkEditor_Helper_AssetsVersionTrimerService',
            'ivory_ck_editor.helper.templating' => 'getIvoryCkEditor_Helper_TemplatingService',
            'ivory_ck_editor.plugin_manager' => 'getIvoryCkEditor_PluginManagerService',
            'ivory_ck_editor.styles_set_manager' => 'getIvoryCkEditor_StylesSetManagerService',
            'ivory_ck_editor.template_manager' => 'getIvoryCkEditor_TemplateManagerService',
            'ivory_ck_editor.twig_extension' => 'getIvoryCkEditor_TwigExtensionService',
            'jms_aop.interceptor_loader' => 'getJmsAop_InterceptorLoaderService',
            'jms_aop.pointcut_container' => 'getJmsAop_PointcutContainerService',
            'jms_di_extra.controller_resolver' => 'getJmsDiExtra_ControllerResolverService',
            'jms_di_extra.metadata.converter' => 'getJmsDiExtra_Metadata_ConverterService',
            'jms_di_extra.metadata.metadata_factory' => 'getJmsDiExtra_Metadata_MetadataFactoryService',
            'jms_di_extra.metadata_driver' => 'getJmsDiExtra_MetadataDriverService',
            'jms_di_extra.service_naming_strategy' => 'getJmsDiExtra_ServiceNamingStrategyService',
            'jms_serializer' => 'getJmsSerializerService',
            'jms_serializer.array_collection_handler' => 'getJmsSerializer_ArrayCollectionHandlerService',
            'jms_serializer.constraint_violation_handler' => 'getJmsSerializer_ConstraintViolationHandlerService',
            'jms_serializer.datetime_handler' => 'getJmsSerializer_DatetimeHandlerService',
            'jms_serializer.doctrine_proxy_subscriber' => 'getJmsSerializer_DoctrineProxySubscriberService',
            'jms_serializer.form_error_handler' => 'getJmsSerializer_FormErrorHandlerService',
            'jms_serializer.handler_registry' => 'getJmsSerializer_HandlerRegistryService',
            'jms_serializer.json_deserialization_visitor' => 'getJmsSerializer_JsonDeserializationVisitorService',
            'jms_serializer.json_serialization_visitor' => 'getJmsSerializer_JsonSerializationVisitorService',
            'jms_serializer.metadata_driver' => 'getJmsSerializer_MetadataDriverService',
            'jms_serializer.naming_strategy' => 'getJmsSerializer_NamingStrategyService',
            'jms_serializer.object_constructor' => 'getJmsSerializer_ObjectConstructorService',
            'jms_serializer.php_collection_handler' => 'getJmsSerializer_PhpCollectionHandlerService',
            'jms_serializer.templating.helper.serializer' => 'getJmsSerializer_Templating_Helper_SerializerService',
            'jms_serializer.unserialize_object_constructor' => 'getJmsSerializer_UnserializeObjectConstructorService',
            'jms_serializer.xml_deserialization_visitor' => 'getJmsSerializer_XmlDeserializationVisitorService',
            'jms_serializer.xml_serialization_visitor' => 'getJmsSerializer_XmlSerializationVisitorService',
            'jms_serializer.yaml_serialization_visitor' => 'getJmsSerializer_YamlSerializationVisitorService',
            'kernel' => 'getKernelService',
            'kernel.class_cache.cache_warmer' => 'getKernel_ClassCache_CacheWarmerService',
            'knp_paginator' => 'getKnpPaginatorService',
            'knp_paginator.helper.processor' => 'getKnpPaginator_Helper_ProcessorService',
            'knp_paginator.subscriber.filtration' => 'getKnpPaginator_Subscriber_FiltrationService',
            'knp_paginator.subscriber.paginate' => 'getKnpPaginator_Subscriber_PaginateService',
            'knp_paginator.subscriber.sliding_pagination' => 'getKnpPaginator_Subscriber_SlidingPaginationService',
            'knp_paginator.subscriber.sortable' => 'getKnpPaginator_Subscriber_SortableService',
            'knp_paginator.twig.extension.pagination' => 'getKnpPaginator_Twig_Extension_PaginationService',
            'locale_listener' => 'getLocaleListenerService',
            'logger' => 'getLoggerService',
            'monolog.formatter.ip_request' => 'getMonolog_Formatter_IpRequestService',
            'monolog.handler.cron' => 'getMonolog_Handler_CronService',
            'monolog.handler.grouped' => 'getMonolog_Handler_GroupedService',
            'monolog.handler.main' => 'getMonolog_Handler_MainService',
            'monolog.handler.streamed' => 'getMonolog_Handler_StreamedService',
            'monolog.handler.swift' => 'getMonolog_Handler_SwiftService',
            'monolog.handler.swift.mail_message_factory' => 'getMonolog_Handler_Swift_MailMessageFactoryService',
            'monolog.logger.assetic' => 'getMonolog_Logger_AsseticService',
            'monolog.logger.cron' => 'getMonolog_Logger_CronService',
            'monolog.logger.doctrine' => 'getMonolog_Logger_DoctrineService',
            'monolog.logger.php' => 'getMonolog_Logger_PhpService',
            'monolog.logger.request' => 'getMonolog_Logger_RequestService',
            'monolog.logger.router' => 'getMonolog_Logger_RouterService',
            'monolog.logger.security' => 'getMonolog_Logger_SecurityService',
            'monolog.logger.translation' => 'getMonolog_Logger_TranslationService',
            'monolog.processor.ip_request' => 'getMonolog_Processor_IpRequestService',
            'property_accessor' => 'getPropertyAccessorService',
            'request' => 'getRequestService',
            'request_stack' => 'getRequestStackService',
            'response_listener' => 'getResponseListenerService',
            'router' => 'getRouterService',
            'router.request_context' => 'getRouter_RequestContextService',
            'router_listener' => 'getRouterListenerService',
            'routing.loader' => 'getRouting_LoaderService',
            'security.access.decision_manager' => 'getSecurity_Access_DecisionManagerService',
            'security.access.method_interceptor' => 'getSecurity_Access_MethodInterceptorService',
            'security.access.pointcut' => 'getSecurity_Access_PointcutService',
            'security.authentication.guard_handler' => 'getSecurity_Authentication_GuardHandlerService',
            'security.authentication.manager' => 'getSecurity_Authentication_ManagerService',
            'security.authentication.trust_resolver' => 'getSecurity_Authentication_TrustResolverService',
            'security.authentication_utils' => 'getSecurity_AuthenticationUtilsService',
            'security.authorization_checker' => 'getSecurity_AuthorizationCheckerService',
            'security.context' => 'getSecurity_ContextService',
            'security.csrf.token_manager' => 'getSecurity_Csrf_TokenManagerService',
            'security.encoder_factory' => 'getSecurity_EncoderFactoryService',
            'security.expressions.compiler' => 'getSecurity_Expressions_CompilerService',
            'security.expressions.handler' => 'getSecurity_Expressions_HandlerService',
            'security.expressions.reverse_interpreter' => 'getSecurity_Expressions_ReverseInterpreterService',
            'security.extra.metadata_driver' => 'getSecurity_Extra_MetadataDriverService',
            'security.extra.metadata_factory' => 'getSecurity_Extra_MetadataFactoryService',
            'security.firewall' => 'getSecurity_FirewallService',
            'security.firewall.map.context.secured_area' => 'getSecurity_Firewall_Map_Context_SecuredAreaService',
            'security.logout_url_generator' => 'getSecurity_LogoutUrlGeneratorService',
            'security.password_encoder' => 'getSecurity_PasswordEncoderService',
            'security.rememberme.response_listener' => 'getSecurity_Rememberme_ResponseListenerService',
            'security.role_hierarchy' => 'getSecurity_RoleHierarchyService',
            'security.secure_random' => 'getSecurity_SecureRandomService',
            'security.token_storage' => 'getSecurity_TokenStorageService',
            'security.user.provider.concrete.database' => 'getSecurity_User_Provider_Concrete_DatabaseService',
            'security.user_checker.secured_area' => 'getSecurity_UserChecker_SecuredAreaService',
            'security.validator.user_password' => 'getSecurity_Validator_UserPasswordService',
            'sensio_framework_extra.cache.listener' => 'getSensioFrameworkExtra_Cache_ListenerService',
            'sensio_framework_extra.controller.listener' => 'getSensioFrameworkExtra_Controller_ListenerService',
            'sensio_framework_extra.converter.datetime' => 'getSensioFrameworkExtra_Converter_DatetimeService',
            'sensio_framework_extra.converter.doctrine.orm' => 'getSensioFrameworkExtra_Converter_Doctrine_OrmService',
            'sensio_framework_extra.converter.listener' => 'getSensioFrameworkExtra_Converter_ListenerService',
            'sensio_framework_extra.converter.manager' => 'getSensioFrameworkExtra_Converter_ManagerService',
            'sensio_framework_extra.security.listener' => 'getSensioFrameworkExtra_Security_ListenerService',
            'sensio_framework_extra.view.guesser' => 'getSensioFrameworkExtra_View_GuesserService',
            'sensio_framework_extra.view.listener' => 'getSensioFrameworkExtra_View_ListenerService',
            'service_container' => 'getServiceContainerService',
            'session' => 'getSessionService',
            'session.handler' => 'getSession_HandlerService',
            'session.save_listener' => 'getSession_SaveListenerService',
            'session.storage.filesystem' => 'getSession_Storage_FilesystemService',
            'session.storage.metadata_bag' => 'getSession_Storage_MetadataBagService',
            'session.storage.native' => 'getSession_Storage_NativeService',
            'session.storage.php_bridge' => 'getSession_Storage_PhpBridgeService',
            'session_listener' => 'getSessionListenerService',
            'simple_html_dom' => 'getSimpleHtmlDomService',
            'sonata.admin.biblioteca.libri' => 'getSonata_Admin_Biblioteca_LibriService',
            'sonata.admin.biblioteca.sezioni' => 'getSonata_Admin_Biblioteca_SezioniService',
            'sonata.admin.editto' => 'getSonata_Admin_EdittoService',
            'sonata.admin.enclave' => 'getSonata_Admin_EnclaveService',
            'sonata.admin.enclave.category' => 'getSonata_Admin_Enclave_CategoryService',
            'sonata.admin.enclave.level' => 'getSonata_Admin_Enclave_LevelService',
            'sonata.admin.enclave.rank' => 'getSonata_Admin_Enclave_RankService',
            'sonata.admin.enclave.title' => 'getSonata_Admin_Enclave_TitleService',
            'sonata.admin.forum' => 'getSonata_Admin_ForumService',
            'sonata.admin.forum.category' => 'getSonata_Admin_Forum_CategoryService',
            'sonata.admin.gravestone' => 'getSonata_Admin_GravestoneService',
            'sonata.admin.grimory.spell.category' => 'getSonata_Admin_Grimory_Spell_CategoryService',
            'sonata.admin.grimory.spell.spells' => 'getSonata_Admin_Grimory_Spell_SpellsService',
            'sonata.admin.items.item' => 'getSonata_Admin_Items_ItemService',
            'sonata.admin.items.itemtype' => 'getSonata_Admin_Items_ItemtypeService',
            'sonata.admin.items.property' => 'getSonata_Admin_Items_PropertyService',
            'sonata.admin.items.property.items' => 'getSonata_Admin_Items_Property_ItemsService',
            'sonata.admin.letter' => 'getSonata_Admin_LetterService',
            'sonata.admin.letter.background' => 'getSonata_Admin_Letter_BackgroundService',
            'sonata.admin.location' => 'getSonata_Admin_LocationService',
            'sonata.admin.location.image' => 'getSonata_Admin_Location_ImageService',
            'sonata.admin.location.tag' => 'getSonata_Admin_Location_TagService',
            'sonata.admin.manuale' => 'getSonata_Admin_ManualeService',
            'sonata.admin.marque' => 'getSonata_Admin_MarqueService',
            'sonata.admin.meteo.combination' => 'getSonata_Admin_Meteo_CombinationService',
            'sonata.admin.meteo.condition' => 'getSonata_Admin_Meteo_ConditionService',
            'sonata.admin.meteo.message' => 'getSonata_Admin_Meteo_MessageService',
            'sonata.admin.meteo.month' => 'getSonata_Admin_Meteo_MonthService',
            'sonata.admin.meteo.season' => 'getSonata_Admin_Meteo_SeasonService',
            'sonata.admin.meteo.status' => 'getSonata_Admin_Meteo_StatusService',
            'sonata.admin.meteo.wind' => 'getSonata_Admin_Meteo_WindService',
            'sonata.admin.moon' => 'getSonata_Admin_MoonService',
            'sonata.admin.moon.status' => 'getSonata_Admin_Moon_StatusService',
            'sonata.admin.news' => 'getSonata_Admin_NewsService',
            'sonata.admin.race' => 'getSonata_Admin_RaceService',
            'sonata.admin.race.eyecolor' => 'getSonata_Admin_Race_EyecolorService',
            'sonata.admin.race.furcolor' => 'getSonata_Admin_Race_FurcolorService',
            'sonata.admin.race.haircolor' => 'getSonata_Admin_Race_HaircolorService',
            'sonata.admin.race.level' => 'getSonata_Admin_Race_LevelService',
            'sonata.admin.race.skincolor' => 'getSonata_Admin_Race_SkincolorService',
            'sonata.admin.race.squamacolor' => 'getSonata_Admin_Race_SquamacolorService',
            'sonata.admin.upload' => 'getSonata_Admin_UploadService',
            'sonata.admin.users.personage' => 'getSonata_Admin_Users_PersonageService',
            'sonata.admin.users.personage.achievement' => 'getSonata_Admin_Users_Personage_AchievementService',
            'sonata.admin.users.personage.combat' => 'getSonata_Admin_Users_Personage_CombatService',
            'sonata.admin.users.personage.esilio' => 'getSonata_Admin_Users_Personage_EsilioService',
            'sonata.admin.users.personage.experiences' => 'getSonata_Admin_Users_Personage_ExperiencesService',
            'sonata.admin.users.personage.forbiddenname' => 'getSonata_Admin_Users_Personage_ForbiddennameService',
            'sonata.admin.users.personage.language' => 'getSonata_Admin_Users_Personage_LanguageService',
            'sonata.admin.users.personage.skill' => 'getSonata_Admin_Users_Personage_SkillService',
            'sonata.admin.users.personage.surname' => 'getSonata_Admin_Users_Personage_SurnameService',
            'sonata.admin.users.personage.type' => 'getSonata_Admin_Users_Personage_TypeService',
            'sonata.admin.wise.sentence' => 'getSonata_Admin_Wise_SentenceService',
            'sonata.admin.wise.tag' => 'getSonata_Admin_Wise_TagService',
            'sonata.admin.work' => 'getSonata_Admin_WorkService',
            'stof_doctrine_extensions.uploadable.manager' => 'getStofDoctrineExtensions_Uploadable_ManagerService',
            'streamed_response_listener' => 'getStreamedResponseListenerService',
            'swiftmailer.email_sender.listener' => 'getSwiftmailer_EmailSender_ListenerService',
            'swiftmailer.mailer.default' => 'getSwiftmailer_Mailer_DefaultService',
            'swiftmailer.mailer.default.spool' => 'getSwiftmailer_Mailer_Default_SpoolService',
            'swiftmailer.mailer.default.transport' => 'getSwiftmailer_Mailer_Default_TransportService',
            'swiftmailer.mailer.default.transport.eventdispatcher' => 'getSwiftmailer_Mailer_Default_Transport_EventdispatcherService',
            'swiftmailer.mailer.default.transport.real' => 'getSwiftmailer_Mailer_Default_Transport_RealService',
            'templating' => 'getTemplatingService',
            'templating.filename_parser' => 'getTemplating_FilenameParserService',
            'templating.helper.assets' => 'getTemplating_Helper_AssetsService',
            'templating.helper.logout_url' => 'getTemplating_Helper_LogoutUrlService',
            'templating.helper.router' => 'getTemplating_Helper_RouterService',
            'templating.helper.security' => 'getTemplating_Helper_SecurityService',
            'templating.loader' => 'getTemplating_LoaderService',
            'templating.locator' => 'getTemplating_LocatorService',
            'templating.name_parser' => 'getTemplating_NameParserService',
            'translation.dumper.csv' => 'getTranslation_Dumper_CsvService',
            'translation.dumper.ini' => 'getTranslation_Dumper_IniService',
            'translation.dumper.json' => 'getTranslation_Dumper_JsonService',
            'translation.dumper.mo' => 'getTranslation_Dumper_MoService',
            'translation.dumper.php' => 'getTranslation_Dumper_PhpService',
            'translation.dumper.po' => 'getTranslation_Dumper_PoService',
            'translation.dumper.qt' => 'getTranslation_Dumper_QtService',
            'translation.dumper.res' => 'getTranslation_Dumper_ResService',
            'translation.dumper.xliff' => 'getTranslation_Dumper_XliffService',
            'translation.dumper.yml' => 'getTranslation_Dumper_YmlService',
            'translation.extractor' => 'getTranslation_ExtractorService',
            'translation.extractor.php' => 'getTranslation_Extractor_PhpService',
            'translation.loader' => 'getTranslation_LoaderService',
            'translation.loader.csv' => 'getTranslation_Loader_CsvService',
            'translation.loader.dat' => 'getTranslation_Loader_DatService',
            'translation.loader.ini' => 'getTranslation_Loader_IniService',
            'translation.loader.json' => 'getTranslation_Loader_JsonService',
            'translation.loader.mo' => 'getTranslation_Loader_MoService',
            'translation.loader.php' => 'getTranslation_Loader_PhpService',
            'translation.loader.po' => 'getTranslation_Loader_PoService',
            'translation.loader.qt' => 'getTranslation_Loader_QtService',
            'translation.loader.res' => 'getTranslation_Loader_ResService',
            'translation.loader.xliff' => 'getTranslation_Loader_XliffService',
            'translation.loader.yml' => 'getTranslation_Loader_YmlService',
            'translation.writer' => 'getTranslation_WriterService',
            'translator.default' => 'getTranslator_DefaultService',
            'translator_listener' => 'getTranslatorListenerService',
            'twig' => 'getTwigService',
            'twig.controller.exception' => 'getTwig_Controller_ExceptionService',
            'twig.controller.preview_error' => 'getTwig_Controller_PreviewErrorService',
            'twig.exception_listener' => 'getTwig_ExceptionListenerService',
            'twig.extension.intl' => 'getTwig_Extension_IntlService',
            'twig.loader' => 'getTwig_LoaderService',
            'twig.profile' => 'getTwig_ProfileService',
            'twig.translation.extractor' => 'getTwig_Translation_ExtractorService',
            'uri_signer' => 'getUriSignerService',
            'user.encoder.password' => 'getUser_Encoder_PasswordService',
            'user.listener.activity' => 'getUser_Listener_ActivityService',
            'validator' => 'getValidatorService',
            'validator.builder' => 'getValidator_BuilderService',
            'validator.email' => 'getValidator_EmailService',
            'validator.expression' => 'getValidator_ExpressionService',
            'vich_uploader.file_injector' => 'getVichUploader_FileInjectorService',
            'vich_uploader.form.type.file' => 'getVichUploader_Form_Type_FileService',
            'vich_uploader.form.type.image' => 'getVichUploader_Form_Type_ImageService',
            'vich_uploader.metadata_reader' => 'getVichUploader_MetadataReaderService',
            'vich_uploader.namer_origname' => 'getVichUploader_NamerOrignameService',
            'vich_uploader.namer_uniqid' => 'getVichUploader_NamerUniqidService',
            'vich_uploader.property_mapping_factory' => 'getVichUploader_PropertyMappingFactoryService',
            'vich_uploader.storage.file_system' => 'getVichUploader_Storage_FileSystemService',
            'vich_uploader.storage_factory' => 'getVichUploader_StorageFactoryService',
            'vich_uploader.templating.helper.uploader_helper' => 'getVichUploader_Templating_Helper_UploaderHelperService',
            'vich_uploader.upload_handler' => 'getVichUploader_UploadHandlerService',
        );
        $this->aliases = array(
            'database_connection' => 'doctrine.dbal.default_connection',
            'doctrine.orm.entity_manager' => 'doctrine.orm.default_entity_manager',
            'mailer' => 'swiftmailer.mailer.default',
            'serializer' => 'jms_serializer',
            'session.storage' => 'session.storage.native',
            'swiftmailer.mailer' => 'swiftmailer.mailer.default',
            'swiftmailer.spool' => 'swiftmailer.mailer.default.spool',
            'swiftmailer.transport' => 'swiftmailer.mailer.default.transport',
            'swiftmailer.transport.real' => 'swiftmailer.mailer.default.transport.real',
            'translator' => 'translator.default',
            'vich_uploader.storage' => 'vich_uploader.storage.file_system',
        );
    }
    public function compile()
    {
        throw new LogicException('You cannot compile a dumped frozen container.');
    }
    protected function getAnnotationReaderService()
    {
        return $this->services['annotation_reader'] = new \Doctrine\Common\Annotations\CachedReader(new \Doctrine\Common\Annotations\AnnotationReader(), new \Doctrine\Common\Cache\FilesystemCache((__DIR__.'/annotations')), false);
    }
    protected function getAssetic_AssetManagerService()
    {
        $a = $this->get('templating.loader');
        $this->services['assetic.asset_manager'] = $instance = new \Assetic\Factory\LazyAssetManager($this->get('assetic.asset_factory'), array('twig' => new \Assetic\Factory\Loader\CachedFormulaLoader(new \Assetic\Extension\Twig\TwigFormulaLoader($this->get('twig'), $this->get('monolog.logger.assetic', ContainerInterface::NULL_ON_INVALID_REFERENCE)), new \Assetic\Cache\ConfigCache((__DIR__.'/assetic/config')), false)));
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'GdrSiteBundle', ($this->targetDirs[2].'/Resources/GdrSiteBundle/views'), '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'GdrSiteBundle', ($this->targetDirs[3].'/src/Gdr/SiteBundle/Resources/views'), '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'GdrGameBundle', ($this->targetDirs[2].'/Resources/GdrGameBundle/views'), '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'GdrGameBundle', ($this->targetDirs[3].'/src/Gdr/GameBundle/Resources/views'), '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'GdrAvatarBundle', ($this->targetDirs[2].'/Resources/GdrAvatarBundle/views'), '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'GdrAvatarBundle', ($this->targetDirs[3].'/src/Gdr/AvatarBundle/Resources/views'), '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'GdrAdministrationBundle', ($this->targetDirs[2].'/Resources/GdrAdministrationBundle/views'), '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'GdrAdministrationBundle', ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/views'), '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\CoalescingDirectoryResource(array(0 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'GdrUserBundle', ($this->targetDirs[2].'/Resources/GdrUserBundle/views'), '/\\.[^.]+\\.twig$/'), 1 => new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, 'GdrUserBundle', ($this->targetDirs[3].'/src/Gdr/UserBundle/Resources/views'), '/\\.[^.]+\\.twig$/'))), 'twig');
        $instance->addResource(new \Symfony\Bundle\AsseticBundle\Factory\Resource\DirectoryResource($a, '', ($this->targetDirs[2].'/Resources/views'), '/\\.[^.]+\\.twig$/'), 'twig');
        return $instance;
    }
    protected function getAssetic_Filter_CssrewriteService()
    {
        return $this->services['assetic.filter.cssrewrite'] = new \Assetic\Filter\CssRewriteFilter();
    }
    protected function getAssetic_Filter_UglifycssService()
    {
        $this->services['assetic.filter.uglifycss'] = $instance = new \Assetic\Filter\UglifyCssFilter('/usr/local/bin/uglifycss', '/usr/bin/node');
        $instance->setTimeout(NULL);
        $instance->setNodePaths(array());
        $instance->setExpandVars(false);
        $instance->setUglyComments(false);
        $instance->setCuteComments(false);
        return $instance;
    }
    protected function getAssetic_Filter_Uglifyjs2Service()
    {
        $this->services['assetic.filter.uglifyjs2'] = $instance = new \Assetic\Filter\UglifyJs2Filter('/usr/local/bin/uglifyjs', '/usr/bin/node');
        $instance->setTimeout(NULL);
        $instance->setNodePaths(array());
        $instance->setCompress(false);
        $instance->setBeautify(false);
        $instance->setMangle(false);
        $instance->setScrewIe8(false);
        $instance->setComments(false);
        $instance->setWrap(false);
        $instance->setDefines(array());
        return $instance;
    }
    protected function getAssetic_FilterManagerService()
    {
        return $this->services['assetic.filter_manager'] = new \Symfony\Bundle\AsseticBundle\FilterManager($this, array('cssrewrite' => 'assetic.filter.cssrewrite', 'uglifyjs2' => 'assetic.filter.uglifyjs2', 'uglifycss' => 'assetic.filter.uglifycss'));
    }
    protected function getAssets_VersionDefaultService()
    {
        return $this->services['assets._version__default'] = new \Symfony\Component\Asset\VersionStrategy\StaticVersionStrategy('v1.0.65', '%s?%s');
    }
    protected function getAssets_ContextService()
    {
        return $this->services['assets.context'] = new \Symfony\Component\Asset\Context\RequestStackContext($this->get('request_stack'));
    }
    protected function getAssets_PackagesService()
    {
        return $this->services['assets.packages'] = new \Symfony\Component\Asset\Packages(new \Symfony\Component\Asset\PathPackage('', $this->get('assets._version__default'), $this->get('assets.context')), array());
    }
    protected function getAuthenticationHandlerService()
    {
        return $this->services['authentication_handler'] = new \Gdr\UserBundle\Handler\AuthenticationHandler($this->get('router'), $this->get('doctrine.orm.default_entity_manager'), $this->get('security.context'), $this->get('session'));
    }
    protected function getCacheClearerService()
    {
        return $this->services['cache_clearer'] = new \Symfony\Component\HttpKernel\CacheClearer\ChainCacheClearer(array());
    }
    protected function getCacheWarmerService()
    {
        $a = $this->get('kernel');
        $b = $this->get('templating.filename_parser');
        $c = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TemplateFinder($a, $b, ($this->targetDirs[2].'/Resources'));
        return $this->services['cache_warmer'] = new \Symfony\Component\HttpKernel\CacheWarmer\CacheWarmerAggregate(array(0 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TemplatePathsCacheWarmer($c, $this->get('templating.locator')), 1 => new \Symfony\Bundle\AsseticBundle\CacheWarmer\AssetManagerCacheWarmer($this), 2 => $this->get('kernel.class_cache.cache_warmer'), 3 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\TranslationsCacheWarmer($this->get('translator.default')), 4 => new \Symfony\Bundle\FrameworkBundle\CacheWarmer\RouterCacheWarmer($this->get('router')), 5 => new \Symfony\Bundle\TwigBundle\CacheWarmer\TemplateCacheCacheWarmer($this, $c, array()), 6 => new \Symfony\Bundle\TwigBundle\CacheWarmer\TemplateCacheWarmer($this->get('twig'), new \Symfony\Bundle\TwigBundle\TemplateIterator($a, $this->targetDirs[2], array())), 7 => new \Symfony\Bridge\Doctrine\CacheWarmer\ProxyCacheWarmer($this->get('doctrine')), 8 => new \JMS\DiExtraBundle\HttpKernel\ControllerInjectorsWarmer($a, $this->get('jms_di_extra.controller_resolver'), array()), 9 => $this->get('exercise_html_purifier.cache_warmer.serializer')));
    }
    protected function getConfigCacheFactoryService()
    {
        return $this->services['config_cache_factory'] = new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory(array());
    }
    protected function getDebug_DebugHandlersListenerService()
    {
        return $this->services['debug.debug_handlers_listener'] = new \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener(NULL, NULL, NULL, NULL, true, NULL);
    }
    protected function getDebug_StopwatchService()
    {
        return $this->services['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch();
    }
    protected function getDoctrineService()
    {
        return $this->services['doctrine'] = new \Doctrine\Bundle\DoctrineBundle\Registry($this, array('default' => 'doctrine.dbal.default_connection'), array('default' => 'doctrine.orm.default_entity_manager'), 'default', 'default');
    }
    protected function getDoctrine_Dbal_ConnectionFactoryService()
    {
        return $this->services['doctrine.dbal.connection_factory'] = new \Doctrine\Bundle\DoctrineBundle\ConnectionFactory(array());
    }
    protected function getDoctrine_Dbal_DefaultConnectionService()
    {
        $a = $this->get('vich_uploader.metadata_reader');
        $b = $this->get('vich_uploader.upload_handler');
        $c = $this->get('annotation_reader');
        $d = new \Vich\UploaderBundle\Adapter\ORM\DoctrineORMAdapter();
        $e = new \Gedmo\Timestampable\TimestampableListener();
        $e->setAnnotationReader($c);
        $f = new \Gedmo\Sluggable\SluggableListener();
        $f->setAnnotationReader($c);
        $g = new \Symfony\Bridge\Doctrine\ContainerAwareEventManager($this);
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\CleanListener('race_big_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\CleanListener('item_big_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\CleanListener('item_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\CleanListener('item_type', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\CleanListener('avatar_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\CleanListener('achievement_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\CleanListener('skill_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('meteo_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('item_type', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('race_big_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('item_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('item_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\RemoveListener('item_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\RemoveListener('item_type', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('enclave_upload', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('skill_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('avatar_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('item_type', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('item_big_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('general_upload', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('moon_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('book_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\RemoveListener('item_big_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('location_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('item_big_image', $d, $a, $b));
        $g->addEventSubscriber($e);
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('item_icon_dress_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('enclave_upload', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('item_icon_dress_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('avatar_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('race_icon_male', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\RemoveListener('avatar_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\RemoveListener('race_icon_male', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('skill_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('race_icon_male', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\RemoveListener('skill_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('race_icon_female', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('general_upload', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('race_icon_female', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('meteo_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('race_default_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('book_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('race_default_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('moon_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('race_big_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('location_image', $d, $a, $b));
        $g->addEventSubscriber($f);
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\InjectListener('achievement_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\RemoveListener('achievement_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\RemoveListener('race_big_image', $d, $a, $b));
        $g->addEventSubscriber(new \Vich\UploaderBundle\EventListener\Doctrine\UploadListener('achievement_image', $d, $a, $b));
        $g->addEventListener(array(0 => 'loadClassMetadata'), $this->get('doctrine.orm.default_listeners.attach_entity_listeners'));
        $g->addEventListener(array(0 => 'postPersist', 1 => 'preRemove', 2 => 'preUpdate'), $this->get('gdr.game_bundle.listener.doctrine_updater_listener'));
        return $this->services['doctrine.dbal.default_connection'] = $this->get('doctrine.dbal.connection_factory')->createConnection(array('driver' => 'pdo_mysql', 'host' => '127.0.0.1', 'port' => NULL, 'dbname' => 'gdr', 'user' => 'gdr', 'password' => 'LyCKaF7J95D6CShu', 'charset' => 'UTF8', 'driverOptions' => array(), 'defaultTableOptions' => array()), new \Doctrine\DBAL\Configuration(), $g, array());
    }
    protected function getDoctrine_Orm_DefaultEntityListenerResolverService()
    {
        return $this->services['doctrine.orm.default_entity_listener_resolver'] = new \Doctrine\ORM\Mapping\DefaultEntityListenerResolver();
    }
    protected function getDoctrine_Orm_DefaultEntityManagerService()
    {
        require_once (__DIR__.'/jms_diextra/doctrine/EntityManager_593ab854cafdb.php');
        $a = $this->get('annotation_reader');
        $b = $this->get('doctrine_cache.providers.delex_apc');
        $c = new \Doctrine\ORM\Mapping\Driver\AnnotationDriver($a, array(0 => ($this->targetDirs[3].'/src/Gdr/UserBundle/Entity'), 1 => ($this->targetDirs[3].'/src/Gdr/GameBundle/Entity'), 2 => ($this->targetDirs[3].'/src/Gdr/RaceBundle/Entity'), 3 => ($this->targetDirs[3].'/src/Gdr/AvatarBundle/Entity'), 4 => ($this->targetDirs[3].'/src/Gdr/ItemsBundle/Entity'), 5 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Entity'), 6 => ($this->targetDirs[3].'/src/Gdr/MeteoBundle/Entity')));
        $d = new \Doctrine\Common\Persistence\Mapping\Driver\MappingDriverChain();
        $d->addDriver($c, 'Gdr\\UserBundle\\Entity');
        $d->addDriver($c, 'Gdr\\GameBundle\\Entity');
        $d->addDriver($c, 'Gdr\\RaceBundle\\Entity');
        $d->addDriver($c, 'Gdr\\AvatarBundle\\Entity');
        $d->addDriver($c, 'Gdr\\ItemsBundle\\Entity');
        $d->addDriver($c, 'Gdr\\AdministrationBundle\\Entity');
        $d->addDriver($c, 'Gdr\\MeteoBundle\\Entity');
        $e = new \Doctrine\ORM\Configuration();
        $e->setEntityNamespaces(array('GdrUserBundle' => 'Gdr\\UserBundle\\Entity', 'GdrGameBundle' => 'Gdr\\GameBundle\\Entity', 'GdrRaceBundle' => 'Gdr\\RaceBundle\\Entity', 'GdrAvatarBundle' => 'Gdr\\AvatarBundle\\Entity', 'GdrItemsBundle' => 'Gdr\\ItemsBundle\\Entity', 'GdrAdministrationBundle' => 'Gdr\\AdministrationBundle\\Entity', 'GdrMeteoBundle' => 'Gdr\\MeteoBundle\\Entity'));
        $e->setMetadataCacheImpl($b);
        $e->setQueryCacheImpl($b);
        $e->setResultCacheImpl($b);
        $e->setMetadataDriverImpl($d);
        $e->setProxyDir((__DIR__.'/doctrine/orm/Proxies'));
        $e->setProxyNamespace('Proxies');
        $e->setAutoGenerateProxyClasses(false);
        $e->setClassMetadataFactoryName('Doctrine\\ORM\\Mapping\\ClassMetadataFactory');
        $e->setDefaultRepositoryClassName('Doctrine\\ORM\\EntityRepository');
        $e->setNamingStrategy(new \Doctrine\ORM\Mapping\DefaultNamingStrategy());
        $e->setQuoteStrategy(new \Doctrine\ORM\Mapping\DefaultQuoteStrategy());
        $e->setEntityListenerResolver($this->get('doctrine.orm.default_entity_listener_resolver'));
        $f = \Doctrine\ORM\EntityManager::create($this->get('doctrine.dbal.default_connection'), $e);
        $this->get('doctrine.orm.default_manager_configurator')->configure($f);
        return $this->services['doctrine.orm.default_entity_manager'] = new \EntityManager593ab854cafdb_546a8d27f194334ee012bfe64f629947b07e4919\__CG__\Doctrine\ORM\EntityManager($f, $this);
    }
    protected function getDoctrine_Orm_DefaultListeners_AttachEntityListenersService()
    {
        return $this->services['doctrine.orm.default_listeners.attach_entity_listeners'] = new \Doctrine\ORM\Tools\AttachEntityListenersListener();
    }
    protected function getDoctrine_Orm_DefaultManagerConfiguratorService()
    {
        return $this->services['doctrine.orm.default_manager_configurator'] = new \Doctrine\Bundle\DoctrineBundle\ManagerConfigurator(array(), array());
    }
    protected function getDoctrine_Orm_Validator_UniqueService()
    {
        return $this->services['doctrine.orm.validator.unique'] = new \Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntityValidator($this->get('doctrine'));
    }
    protected function getDoctrine_Orm_ValidatorInitializerService()
    {
        return $this->services['doctrine.orm.validator_initializer'] = new \Symfony\Bridge\Doctrine\Validator\DoctrineInitializer($this->get('doctrine'));
    }
    protected function getDoctrineCache_Providers_DelexApcService()
    {
        return $this->services['doctrine_cache.providers.delex_apc'] = new \Gdr\SiteBundle\Loader\DelexApcCache();
    }
    protected function getEventDispatcherService()
    {
        $this->services['event_dispatcher'] = $instance = new \Symfony\Component\EventDispatcher\ContainerAwareEventDispatcher($this);
        $instance->addListenerService('kernel.controller', array(0 => 'user.listener.activity', 1 => 'onCoreController'), 0);
        $instance->addListenerService('kernel.terminate', array(0 => 'monolog.handler.swift', 1 => 'onKernelTerminate'), 0);
        $instance->addListenerService('console.terminate', array(0 => 'monolog.handler.swift', 1 => 'onCliTerminate'), 0);
        $instance->addListenerService('kernel.request', array(0 => 'knp_paginator.subscriber.sliding_pagination', 1 => 'onKernelRequest'), 0);
        $instance->addSubscriberService('gdr.game.player.killer.notify_killed_randomly', 'Gdr\\GameBundle\\Listener\\Killer\\NotifyKilledRandomly');
        $instance->addSubscriberService('gdr.player.notify_random_skill', 'Gdr\\GameBundle\\Listener\\Trainer\\NotifyRandomSkillAssigned');
        $instance->addSubscriberService('response_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ResponseListener');
        $instance->addSubscriberService('streamed_response_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\StreamedResponseListener');
        $instance->addSubscriberService('locale_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleListener');
        $instance->addSubscriberService('translator_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\TranslatorListener');
        $instance->addSubscriberService('session_listener', 'Symfony\\Bundle\\FrameworkBundle\\EventListener\\SessionListener');
        $instance->addSubscriberService('session.save_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\SaveSessionListener');
        $instance->addSubscriberService('fragment.listener', 'Symfony\\Component\\HttpKernel\\EventListener\\FragmentListener');
        $instance->addSubscriberService('router_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener');
        $instance->addSubscriberService('debug.debug_handlers_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\DebugHandlersListener');
        $instance->addSubscriberService('security.firewall', 'Symfony\\Component\\Security\\Http\\Firewall');
        $instance->addSubscriberService('security.rememberme.response_listener', 'Symfony\\Component\\Security\\Http\\RememberMe\\ResponseListener');
        $instance->addSubscriberService('twig.exception_listener', 'Symfony\\Component\\HttpKernel\\EventListener\\ExceptionListener');
        $instance->addSubscriberService('swiftmailer.email_sender.listener', 'Symfony\\Bundle\\SwiftmailerBundle\\EventListener\\EmailSenderListener');
        $instance->addSubscriberService('sensio_framework_extra.controller.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ControllerListener');
        $instance->addSubscriberService('sensio_framework_extra.converter.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ParamConverterListener');
        $instance->addSubscriberService('sensio_framework_extra.view.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\TemplateListener');
        $instance->addSubscriberService('sensio_framework_extra.cache.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\HttpCacheListener');
        $instance->addSubscriberService('sensio_framework_extra.security.listener', 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\SecurityListener');
        $instance->addListenerService('knp_pager.before', array(0 => 'knp_paginator.subscriber.paginate', 1 => 'before'), 0);
        $instance->addListenerService('knp_pager.pagination', array(0 => 'knp_paginator.subscriber.paginate', 1 => 'pagination'), 0);
        $instance->addListenerService('knp_pager.before', array(0 => 'knp_paginator.subscriber.sortable', 1 => 'before'), 1);
        $instance->addListenerService('knp_pager.before', array(0 => 'knp_paginator.subscriber.filtration', 1 => 'before'), 1);
        $instance->addListenerService('knp_pager.pagination', array(0 => 'knp_paginator.subscriber.sliding_pagination', 1 => 'pagination'), 1);
        return $instance;
    }
    protected function getExerciseHtmlPurifier_CacheWarmer_SerializerService()
    {
        return $this->services['exercise_html_purifier.cache_warmer.serializer'] = new \Exercise\HTMLPurifierBundle\CacheWarmer\SerializerCacheWarmer(array(0 => (__DIR__.'/htmlpurifier')));
    }
    protected function getExerciseHtmlPurifier_Config_CustomService()
    {
        $this->services['exercise_html_purifier.config.custom'] = $instance = \HTMLPurifier_Config::inherit($this->get('exercise_html_purifier.config.default'));
        $instance->loadArray(array('Core.Encoding' => 'UTF-8'));
        return $instance;
    }
    protected function getExerciseHtmlPurifier_Config_DefaultService()
    {
        return $this->services['exercise_html_purifier.config.default'] = \HTMLPurifier_Config::create(array('Cache.SerializerPath' => (__DIR__.'/htmlpurifier')));
    }
    protected function getExerciseHtmlPurifier_CustomService()
    {
        return $this->services['exercise_html_purifier.custom'] = new \HTMLPurifier($this->get('exercise_html_purifier.config.custom'));
    }
    protected function getExerciseHtmlPurifier_DefaultService()
    {
        return $this->services['exercise_html_purifier.default'] = new \HTMLPurifier($this->get('exercise_html_purifier.config.default'));
    }
    protected function getExerciseHtmlPurifier_TwigExtensionService()
    {
        return $this->services['exercise_html_purifier.twig_extension'] = new \Exercise\HTMLPurifierBundle\Twig\HTMLPurifierExtension($this);
    }
    protected function getFileLocatorService()
    {
        return $this->services['file_locator'] = new \Symfony\Component\HttpKernel\Config\FileLocator($this->get('kernel'), ($this->targetDirs[2].'/Resources'));
    }
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \Symfony\Component\Filesystem\Filesystem();
    }
    protected function getForm_CsrfProviderService()
    {
        @trigger_error('The "form.csrf_provider" service is deprecated since Symfony 2.4 and will be removed in 3.0. Use the "security.csrf.token_manager" service instead.', E_USER_DEPRECATED);
        return $this->services['form.csrf_provider'] = new \Symfony\Component\Form\Extension\Csrf\CsrfProvider\CsrfTokenManagerAdapter($this->get('security.csrf.token_manager'));
    }
    protected function getForm_FactoryService()
    {
        return $this->services['form.factory'] = new \Symfony\Component\Form\FormFactory($this->get('form.registry'), $this->get('form.resolved_type_factory'));
    }
    protected function getForm_RegistryService()
    {
        return $this->services['form.registry'] = new \Symfony\Component\Form\FormRegistry(array(0 => new \Symfony\Component\Form\Extension\DependencyInjection\DependencyInjectionExtension($this, array('admin_file' => 'gdr_administration.form.type.admin_file', 'Gdr\\AdministrationBundle\\Form\\Type\\AdminFileType' => 'gdr_administration.form.type.admin_file', 'form' => 'form.type.form', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => 'form.type.form', 'birthday' => 'form.type.birthday', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\BirthdayType' => 'form.type.birthday', 'checkbox' => 'form.type.checkbox', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\CheckboxType' => 'form.type.checkbox', 'choice' => 'form.type.choice', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\ChoiceType' => 'form.type.choice', 'collection' => 'form.type.collection', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\CollectionType' => 'form.type.collection', 'country' => 'form.type.country', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\CountryType' => 'form.type.country', 'date' => 'form.type.date', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\DateType' => 'form.type.date', 'datetime' => 'form.type.datetime', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\DateTimeType' => 'form.type.datetime', 'email' => 'form.type.email', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\EmailType' => 'form.type.email', 'file' => 'form.type.file', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\FileType' => 'form.type.file', 'hidden' => 'form.type.hidden', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\HiddenType' => 'form.type.hidden', 'integer' => 'form.type.integer', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\IntegerType' => 'form.type.integer', 'language' => 'form.type.language', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\LanguageType' => 'form.type.language', 'locale' => 'form.type.locale', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\LocaleType' => 'form.type.locale', 'money' => 'form.type.money', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\MoneyType' => 'form.type.money', 'number' => 'form.type.number', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\NumberType' => 'form.type.number', 'password' => 'form.type.password', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\PasswordType' => 'form.type.password', 'percent' => 'form.type.percent', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\PercentType' => 'form.type.percent', 'radio' => 'form.type.radio', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\RadioType' => 'form.type.radio', 'range' => 'form.type.range', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\RangeType' => 'form.type.range', 'repeated' => 'form.type.repeated', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\RepeatedType' => 'form.type.repeated', 'search' => 'form.type.search', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\SearchType' => 'form.type.search', 'textarea' => 'form.type.textarea', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\TextareaType' => 'form.type.textarea', 'text' => 'form.type.text', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\TextType' => 'form.type.text', 'time' => 'form.type.time', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\TimeType' => 'form.type.time', 'timezone' => 'form.type.timezone', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\TimezoneType' => 'form.type.timezone', 'url' => 'form.type.url', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\UrlType' => 'form.type.url', 'button' => 'form.type.button', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\ButtonType' => 'form.type.button', 'submit' => 'form.type.submit', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\SubmitType' => 'form.type.submit', 'reset' => 'form.type.reset', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\ResetType' => 'form.type.reset', 'currency' => 'form.type.currency', 'Symfony\\Component\\Form\\Extension\\Core\\Type\\CurrencyType' => 'form.type.currency', 'entity' => 'form.type.entity', 'Symfony\\Bridge\\Doctrine\\Form\\Type\\EntityType' => 'form.type.entity', 'ckeditor' => 'ivory_ck_editor.form.type', 'Ivory\\CKEditorBundle\\Form\\Type\\CKEditorType' => 'ivory_ck_editor.form.type', 'vich_file' => 'vich_uploader.form.type.file', 'Vich\\UploaderBundle\\Form\\Type\\VichFileType' => 'vich_uploader.form.type.file', 'vich_image' => 'vich_uploader.form.type.image', 'Vich\\UploaderBundle\\Form\\Type\\VichImageType' => 'vich_uploader.form.type.image', 'name_selector' => 'gdr.game_bundle.form.type.name_selector_type', 'Gdr\\GameBundle\\Form\\Type\\NameSelectorType' => 'gdr.game_bundle.form.type.name_selector_type'), array('Symfony\\Component\\Form\\Extension\\Core\\Type\\FormType' => array(0 => 'form.type_extension.form.http_foundation', 1 => 'form.type_extension.form.validator', 2 => 'form.type_extension.csrf'), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\RepeatedType' => array(0 => 'form.type_extension.repeated.validator'), 'Symfony\\Component\\Form\\Extension\\Core\\Type\\SubmitType' => array(0 => 'form.type_extension.submit.validator')), array(0 => 'form.type_guesser.validator', 1 => 'form.type_guesser.doctrine'))), $this->get('form.resolved_type_factory'));
    }
    protected function getForm_ResolvedTypeFactoryService()
    {
        return $this->services['form.resolved_type_factory'] = new \Symfony\Component\Form\ResolvedFormTypeFactory();
    }
    protected function getForm_Type_BirthdayService()
    {
        return $this->services['form.type.birthday'] = new \Symfony\Component\Form\Extension\Core\Type\BirthdayType();
    }
    protected function getForm_Type_ButtonService()
    {
        return $this->services['form.type.button'] = new \Symfony\Component\Form\Extension\Core\Type\ButtonType();
    }
    protected function getForm_Type_CheckboxService()
    {
        return $this->services['form.type.checkbox'] = new \Symfony\Component\Form\Extension\Core\Type\CheckboxType();
    }
    protected function getForm_Type_ChoiceService()
    {
        return $this->services['form.type.choice'] = new \Symfony\Component\Form\Extension\Core\Type\ChoiceType(new \Symfony\Component\Form\ChoiceList\Factory\CachingFactoryDecorator(new \Symfony\Component\Form\ChoiceList\Factory\PropertyAccessDecorator(new \Symfony\Component\Form\ChoiceList\Factory\DefaultChoiceListFactory(), $this->get('property_accessor'))));
    }
    protected function getForm_Type_CollectionService()
    {
        return $this->services['form.type.collection'] = new \Symfony\Component\Form\Extension\Core\Type\CollectionType();
    }
    protected function getForm_Type_CountryService()
    {
        return $this->services['form.type.country'] = new \Symfony\Component\Form\Extension\Core\Type\CountryType();
    }
    protected function getForm_Type_CurrencyService()
    {
        return $this->services['form.type.currency'] = new \Symfony\Component\Form\Extension\Core\Type\CurrencyType();
    }
    protected function getForm_Type_DateService()
    {
        return $this->services['form.type.date'] = new \Symfony\Component\Form\Extension\Core\Type\DateType();
    }
    protected function getForm_Type_DatetimeService()
    {
        return $this->services['form.type.datetime'] = new \Symfony\Component\Form\Extension\Core\Type\DateTimeType();
    }
    protected function getForm_Type_EmailService()
    {
        return $this->services['form.type.email'] = new \Symfony\Component\Form\Extension\Core\Type\EmailType();
    }
    protected function getForm_Type_EntityService()
    {
        return $this->services['form.type.entity'] = new \Symfony\Bridge\Doctrine\Form\Type\EntityType($this->get('doctrine'));
    }
    protected function getForm_Type_FileService()
    {
        return $this->services['form.type.file'] = new \Symfony\Component\Form\Extension\Core\Type\FileType();
    }
    protected function getForm_Type_FormService()
    {
        return $this->services['form.type.form'] = new \Symfony\Component\Form\Extension\Core\Type\FormType($this->get('property_accessor'));
    }
    protected function getForm_Type_HiddenService()
    {
        return $this->services['form.type.hidden'] = new \Symfony\Component\Form\Extension\Core\Type\HiddenType();
    }
    protected function getForm_Type_IntegerService()
    {
        return $this->services['form.type.integer'] = new \Symfony\Component\Form\Extension\Core\Type\IntegerType();
    }
    protected function getForm_Type_LanguageService()
    {
        return $this->services['form.type.language'] = new \Symfony\Component\Form\Extension\Core\Type\LanguageType();
    }
    protected function getForm_Type_LocaleService()
    {
        return $this->services['form.type.locale'] = new \Symfony\Component\Form\Extension\Core\Type\LocaleType();
    }
    protected function getForm_Type_MoneyService()
    {
        return $this->services['form.type.money'] = new \Symfony\Component\Form\Extension\Core\Type\MoneyType();
    }
    protected function getForm_Type_NumberService()
    {
        return $this->services['form.type.number'] = new \Symfony\Component\Form\Extension\Core\Type\NumberType();
    }
    protected function getForm_Type_PasswordService()
    {
        return $this->services['form.type.password'] = new \Symfony\Component\Form\Extension\Core\Type\PasswordType();
    }
    protected function getForm_Type_PercentService()
    {
        return $this->services['form.type.percent'] = new \Symfony\Component\Form\Extension\Core\Type\PercentType();
    }
    protected function getForm_Type_RadioService()
    {
        return $this->services['form.type.radio'] = new \Symfony\Component\Form\Extension\Core\Type\RadioType();
    }
    protected function getForm_Type_RangeService()
    {
        return $this->services['form.type.range'] = new \Symfony\Component\Form\Extension\Core\Type\RangeType();
    }
    protected function getForm_Type_RepeatedService()
    {
        return $this->services['form.type.repeated'] = new \Symfony\Component\Form\Extension\Core\Type\RepeatedType();
    }
    protected function getForm_Type_ResetService()
    {
        return $this->services['form.type.reset'] = new \Symfony\Component\Form\Extension\Core\Type\ResetType();
    }
    protected function getForm_Type_SearchService()
    {
        return $this->services['form.type.search'] = new \Symfony\Component\Form\Extension\Core\Type\SearchType();
    }
    protected function getForm_Type_SubmitService()
    {
        return $this->services['form.type.submit'] = new \Symfony\Component\Form\Extension\Core\Type\SubmitType();
    }
    protected function getForm_Type_TextService()
    {
        return $this->services['form.type.text'] = new \Symfony\Component\Form\Extension\Core\Type\TextType();
    }
    protected function getForm_Type_TextareaService()
    {
        return $this->services['form.type.textarea'] = new \Symfony\Component\Form\Extension\Core\Type\TextareaType();
    }
    protected function getForm_Type_TimeService()
    {
        return $this->services['form.type.time'] = new \Symfony\Component\Form\Extension\Core\Type\TimeType();
    }
    protected function getForm_Type_TimezoneService()
    {
        return $this->services['form.type.timezone'] = new \Symfony\Component\Form\Extension\Core\Type\TimezoneType();
    }
    protected function getForm_Type_UrlService()
    {
        return $this->services['form.type.url'] = new \Symfony\Component\Form\Extension\Core\Type\UrlType();
    }
    protected function getForm_TypeExtension_CsrfService()
    {
        return $this->services['form.type_extension.csrf'] = new \Symfony\Component\Form\Extension\Csrf\Type\FormTypeCsrfExtension($this->get('security.csrf.token_manager'), true, '_token', $this->get('translator.default'), 'validators');
    }
    protected function getForm_TypeExtension_Form_HttpFoundationService()
    {
        return $this->services['form.type_extension.form.http_foundation'] = new \Symfony\Component\Form\Extension\HttpFoundation\Type\FormTypeHttpFoundationExtension(new \Symfony\Component\Form\Extension\HttpFoundation\HttpFoundationRequestHandler(new \Symfony\Component\Form\Util\ServerParams($this->get('request_stack'))));
    }
    protected function getForm_TypeExtension_Form_ValidatorService()
    {
        return $this->services['form.type_extension.form.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\FormTypeValidatorExtension($this->get('validator'));
    }
    protected function getForm_TypeExtension_Repeated_ValidatorService()
    {
        return $this->services['form.type_extension.repeated.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\RepeatedTypeValidatorExtension();
    }
    protected function getForm_TypeExtension_Submit_ValidatorService()
    {
        return $this->services['form.type_extension.submit.validator'] = new \Symfony\Component\Form\Extension\Validator\Type\SubmitTypeValidatorExtension();
    }
    protected function getForm_TypeGuesser_DoctrineService()
    {
        return $this->services['form.type_guesser.doctrine'] = new \Symfony\Bridge\Doctrine\Form\DoctrineOrmTypeGuesser($this->get('doctrine'));
    }
    protected function getForm_TypeGuesser_ValidatorService()
    {
        return $this->services['form.type_guesser.validator'] = new \Symfony\Component\Form\Extension\Validator\ValidatorTypeGuesser($this->get('validator'));
    }
    protected function getFosJsRouting_ControllerService()
    {
        return $this->services['fos_js_routing.controller'] = new \FOS\JsRoutingBundle\Controller\Controller($this->get('fos_js_routing.serializer'), $this->get('fos_js_routing.extractor'), array('enabled' => false), false);
    }
    protected function getFosJsRouting_ExtractorService()
    {
        return $this->services['fos_js_routing.extractor'] = new \FOS\JsRoutingBundle\Extractor\ExposedRoutesExtractor($this->get('router'), array(), __DIR__, array('FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle', 'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle', 'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle', 'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle', 'SwiftmailerBundle' => 'Symfony\\Bundle\\SwiftmailerBundle\\SwiftmailerBundle', 'AsseticBundle' => 'Symfony\\Bundle\\AsseticBundle\\AsseticBundle', 'DoctrineBundle' => 'Doctrine\\Bundle\\DoctrineBundle\\DoctrineBundle', 'SensioFrameworkExtraBundle' => 'Sensio\\Bundle\\FrameworkExtraBundle\\SensioFrameworkExtraBundle', 'JMSAopBundle' => 'JMS\\AopBundle\\JMSAopBundle', 'JMSDiExtraBundle' => 'JMS\\DiExtraBundle\\JMSDiExtraBundle', 'JMSSecurityExtraBundle' => 'JMS\\SecurityExtraBundle\\JMSSecurityExtraBundle', 'DoctrineFixturesBundle' => 'Doctrine\\Bundle\\FixturesBundle\\DoctrineFixturesBundle', 'StofDoctrineExtensionsBundle' => 'Stof\\DoctrineExtensionsBundle\\StofDoctrineExtensionsBundle', 'IvoryCKEditorBundle' => 'Ivory\\CKEditorBundle\\IvoryCKEditorBundle', 'FOSJsRoutingBundle' => 'FOS\\JsRoutingBundle\\FOSJsRoutingBundle', 'VichUploaderBundle' => 'Vich\\UploaderBundle\\VichUploaderBundle', 'JMSSerializerBundle' => 'JMS\\SerializerBundle\\JMSSerializerBundle', 'ExerciseHTMLPurifierBundle' => 'Exercise\\HTMLPurifierBundle\\ExerciseHTMLPurifierBundle', 'ErivelloSimpleHtmlDomBundle' => 'Erivello\\SimpleHtmlDomBundle\\ErivelloSimpleHtmlDomBundle', 'KnpPaginatorBundle' => 'Knp\\Bundle\\PaginatorBundle\\KnpPaginatorBundle', 'GdrSiteBundle' => 'Gdr\\SiteBundle\\GdrSiteBundle', 'GdrUserBundle' => 'Gdr\\UserBundle\\GdrUserBundle', 'GdrGameBundle' => 'Gdr\\GameBundle\\GdrGameBundle', 'GdrRaceBundle' => 'Gdr\\RaceBundle\\GdrRaceBundle', 'GdrAvatarBundle' => 'Gdr\\AvatarBundle\\GdrAvatarBundle', 'GdrItemsBundle' => 'Gdr\\ItemsBundle\\GdrItemsBundle', 'GdrAdministrationBundle' => 'Gdr\\AdministrationBundle\\GdrAdministrationBundle', 'GdrMeteoBundle' => 'Gdr\\MeteoBundle\\GdrMeteoBundle'));
    }
    protected function getFosJsRouting_SerializerService()
    {
        return $this->services['fos_js_routing.serializer'] = new \Symfony\Component\Serializer\Serializer(array(0 => new \Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer()), array('json' => new \Symfony\Component\Serializer\Encoder\JsonEncoder()));
    }
    protected function getFragment_HandlerService()
    {
        $this->services['fragment.handler'] = $instance = new \Symfony\Component\HttpKernel\DependencyInjection\LazyLoadingFragmentHandler($this, $this->get('request_stack'), false);
        $instance->addRendererService('inline', 'fragment.renderer.inline');
        $instance->addRendererService('hinclude', 'fragment.renderer.hinclude');
        $instance->addRendererService('hinclude', 'fragment.renderer.hinclude');
        $instance->addRendererService('esi', 'fragment.renderer.esi');
        $instance->addRendererService('ssi', 'fragment.renderer.ssi');
        return $instance;
    }
    protected function getFragment_ListenerService()
    {
        return $this->services['fragment.listener'] = new \Symfony\Component\HttpKernel\EventListener\FragmentListener($this->get('uri_signer'), '/_fragment');
    }
    protected function getFragment_Renderer_EsiService()
    {
        $this->services['fragment.renderer.esi'] = $instance = new \Symfony\Component\HttpKernel\Fragment\EsiFragmentRenderer(NULL, $this->get('fragment.renderer.inline'), $this->get('uri_signer'));
        $instance->setFragmentPath('/_fragment');
        return $instance;
    }
    protected function getFragment_Renderer_HincludeService()
    {
        $this->services['fragment.renderer.hinclude'] = $instance = new \Symfony\Component\HttpKernel\Fragment\HIncludeFragmentRenderer($this->get('twig'), $this->get('uri_signer'), NULL);
        $instance->setFragmentPath('/_fragment');
        return $instance;
    }
    protected function getFragment_Renderer_InlineService()
    {
        $this->services['fragment.renderer.inline'] = $instance = new \Symfony\Component\HttpKernel\Fragment\InlineFragmentRenderer($this->get('http_kernel'), $this->get('event_dispatcher'));
        $instance->setFragmentPath('/_fragment');
        return $instance;
    }
    protected function getFragment_Renderer_SsiService()
    {
        $this->services['fragment.renderer.ssi'] = $instance = new \Symfony\Component\HttpKernel\Fragment\SsiFragmentRenderer(NULL, $this->get('fragment.renderer.inline'), $this->get('uri_signer'));
        $instance->setFragmentPath('/_fragment');
        return $instance;
    }
    protected function getGdr_BankloggerService()
    {
        $this->services['gdr.banklogger'] = $instance = new \Gdr\GameBundle\Service\BankLogger();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        return $instance;
    }
    protected function getGdr_CombatService()
    {
        $this->services['gdr.combat'] = $instance = new \Gdr\UserBundle\Service\CombatService();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        $instance->general = $this->get('gdr.game_bundle.general');
        $instance->permission = $this->get('gdr.permission');
        return $instance;
    }
    protected function getGdr_Dom_DocumentService()
    {
        return $this->services['gdr.dom.document'] = new \Gdr\GameBundle\Service\DomDocumentService();
    }
    protected function getGdr_ErarioService()
    {
        $this->services['gdr.erario'] = $instance = new \Gdr\GameBundle\Service\Erario();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        $instance->general = $this->get('gdr.game_bundle.general');
        return $instance;
    }
    protected function getGdr_ForumService()
    {
        $this->services['gdr.forum'] = $instance = new \Gdr\GameBundle\Service\ForumService();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        $instance->purifier = $this->get('exercise_html_purifier.default');
        $instance->logger = $this->get('logger');
        $instance->simpleHTML = $this->get('simple_html_dom');
        $instance->general = $this->get('gdr.game_bundle.general');
        return $instance;
    }
    protected function getGdr_Game_Player_KillerService()
    {
        return $this->services['gdr.game.player.killer'] = new \Gdr\GameBundle\Service\Personage\Killer\Killer($this->get('doctrine.orm.default_entity_manager'), $this->get('event_dispatcher'));
    }
    protected function getGdr_Game_Player_Killer_AgeService()
    {
        return $this->services['gdr.game.player.killer.age'] = new \Gdr\GameBundle\Service\Personage\Killer\KillerAge($this->get('doctrine.orm.default_entity_manager'), $this->get('event_dispatcher'));
    }
    protected function getGdr_Game_Player_Killer_NotifyKilledRandomlyService()
    {
        return $this->services['gdr.game.player.killer.notify_killed_randomly'] = new \Gdr\GameBundle\Listener\Killer\NotifyKilledRandomly($this->get('gdr.notifier.letter'), $this->get('templating'));
    }
    protected function getGdr_Game_Player_Killer_RandomlyService()
    {
        return $this->services['gdr.game.player.killer.randomly'] = new \Gdr\GameBundle\Service\Personage\Killer\KillerRandom($this->get('doctrine.orm.default_entity_manager'), $this->get('event_dispatcher'));
    }
    protected function getGdr_Game_Player_Killer_SuicideService()
    {
        return $this->services['gdr.game.player.killer.suicide'] = new \Gdr\GameBundle\Service\Personage\Killer\KillerSuicide($this->get('doctrine.orm.default_entity_manager'), $this->get('event_dispatcher'));
    }
    protected function getGdr_Game_RandomDeathService()
    {
        return $this->services['gdr.game.random_death'] = new \Gdr\GameBundle\Service\Personage\RandomDeath($this->get('doctrine.orm.default_entity_manager'), $this->get('gdr.game.player.killer.randomly'), $this->get('gdr.game.utils.chance_generator'));
    }
    protected function getGdr_Game_Utils_ChanceGeneratorService()
    {
        return $this->services['gdr.game.utils.chance_generator'] = new \Gdr\GameBundle\Service\ChanceGenerator();
    }
    protected function getGdr_Game_Utils_TextPurifierService()
    {
        return $this->services['gdr.game.utils.text_purifier'] = new \Gdr\GameBundle\Service\TextPurifier($this->get('exercise_html_purifier.default'), $this->get('simple_html_dom'));
    }
    protected function getGdr_GameBundle_Form_Type_NameSelectorTypeService()
    {
        $this->services['gdr.game_bundle.form.type.name_selector_type'] = $instance = new \Gdr\GameBundle\Form\Type\NameSelectorType();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        return $instance;
    }
    protected function getGdr_GameBundle_GeneralService()
    {
        $this->services['gdr.game_bundle.general'] = $instance = new \Gdr\GameBundle\General();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        $instance->session = $this->get('session');
        $instance->purifier = $this->get('exercise_html_purifier.default');
        $instance->router = $this->get('router');
        $instance->forumService = $this->get('gdr.forum');
        return $instance;
    }
    protected function getGdr_GameBundle_Listener_DoctrineUpdaterListenerService()
    {
        return $this->services['gdr.game_bundle.listener.doctrine_updater_listener'] = new \Gdr\GameBundle\Listener\DoctrineUpdaterListener();
    }
    protected function getGdr_GameBundle_Twig_ChatExtensionService()
    {
        $this->services['gdr.game_bundle.twig.chat_extension'] = $instance = new \Gdr\GameBundle\Twig\ChatExtension();
        $instance->general = $this->get('gdr.game_bundle.general');
        return $instance;
    }
    protected function getGdr_GameBundle_Twig_CombatExtensionService()
    {
        $this->services['gdr.game_bundle.twig.combat_extension'] = $instance = new \Gdr\GameBundle\Twig\CombatExtension();
        $instance->combatService = $this->get('gdr.combat');
        return $instance;
    }
    protected function getGdr_GameBundle_Twig_PathExtensionService()
    {
        $this->services['gdr.game_bundle.twig.path_extension'] = $instance = new \Gdr\GameBundle\Twig\PathExtension();
        $instance->container = $this;
        return $instance;
    }
    protected function getGdr_GameBundle_Twig_RaceChatExtensionService()
    {
        $this->services['gdr.game_bundle.twig.race_chat_extension'] = $instance = new \Gdr\GameBundle\Twig\RaceChatExtension();
        $instance->general = $this->get('gdr.game_bundle.general');
        return $instance;
    }
    protected function getGdr_GameBundle_Twig_TeonDateExtensionService()
    {
        return $this->services['gdr.game_bundle.twig.teon_date_extension'] = new \Gdr\GameBundle\Twig\TeonDateExtension();
    }
    protected function getGdr_GameBundle_Twig_TextExtensionService()
    {
        return $this->services['gdr.game_bundle.twig.text_extension'] = new \Gdr\GameBundle\Twig\TextExtension();
    }
    protected function getGdr_GameBundle_Validator_Constraint_ClanFreeValidatorService()
    {
        $this->services['gdr.game_bundle.validator.constraint.clan_free_validator'] = $instance = new \Gdr\GameBundle\Validator\Constraint\ClanFreeValidator();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        return $instance;
    }
    protected function getGdr_GameBundle_Validator_Constraint_DeathFreeValidatorService()
    {
        $this->services['gdr.game_bundle.validator.constraint.death_free_validator'] = $instance = new \Gdr\GameBundle\Validator\Constraint\DeathFreeValidator();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        return $instance;
    }
    protected function getGdr_GameBundle_Validator_Constraint_EnclaveFreeValidatorService()
    {
        $this->services['gdr.game_bundle.validator.constraint.enclave_free_validator'] = $instance = new \Gdr\GameBundle\Validator\Constraint\EnclaveFreeValidator();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        return $instance;
    }
    protected function getGdr_GameBundle_Validator_Constraint_EnoughMoneyValidatorService()
    {
        $this->services['gdr.game_bundle.validator.constraint.enough_money_validator'] = $instance = new \Gdr\GameBundle\Validator\Constraint\EnoughMoneyValidator();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        $instance->session = $this->get('session');
        return $instance;
    }
    protected function getGdr_GameBundle_Validator_Constraint_LifeFreeValidatorService()
    {
        $this->services['gdr.game_bundle.validator.constraint.life_free_validator'] = $instance = new \Gdr\GameBundle\Validator\Constraint\LifeFreeValidator();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        return $instance;
    }
    protected function getGdr_GameBundle_Validator_Constraint_NoMarriedValidatorService()
    {
        $this->services['gdr.game_bundle.validator.constraint.no_married_validator'] = $instance = new \Gdr\GameBundle\Validator\Constraint\NoMarriedValidator();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        return $instance;
    }
    protected function getGdr_GameBundle_Validator_Constraint_NotBannedValidatorService()
    {
        $this->services['gdr.game_bundle.validator.constraint.not_banned_validator'] = $instance = new \Gdr\GameBundle\Validator\Constraint\NotBannedValidator();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        return $instance;
    }
    protected function getGdr_GameBundle_Validator_Constraint_ValidUsernameValidatorService()
    {
        $this->services['gdr.game_bundle.validator.constraint.valid_username_validator'] = $instance = new \Gdr\GameBundle\Validator\Constraint\ValidUsernameValidator();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        return $instance;
    }
    protected function getGdr_Item_ServiceService()
    {
        return $this->services['gdr.item.service'] = new \Gdr\ItemsBundle\Service\ItemService($this->get('doctrine'));
    }
    protected function getGdr_LetterService()
    {
        $this->services['gdr.letter'] = $instance = new \Gdr\GameBundle\Service\LetterService();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        $instance->general = $this->get('gdr.game_bundle.general');
        return $instance;
    }
    protected function getGdr_Logs_CronService()
    {
        return $this->services['gdr.logs.cron'] = new \Gdr\GameBundle\Service\Logger\CronLogger($this->get('monolog.logger.cron'));
    }
    protected function getGdr_Meteo_GeneratorService()
    {
        return $this->services['gdr.meteo.generator'] = new \Gdr\MeteoBundle\Service\Generator($this->get('doctrine'), $this->get('gdr.game_bundle.general'));
    }
    protected function getGdr_Notifier_LetterService()
    {
        return $this->services['gdr.notifier.letter'] = new \Gdr\GameBundle\Service\Notificator\LetterNotifier($this->get('doctrine.orm.default_entity_manager'), $this->get('gdr.game.utils.text_purifier'));
    }
    protected function getGdr_PermissionService()
    {
        $this->services['gdr.permission'] = $instance = new \Gdr\GameBundle\Permission();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        $instance->session = $this->get('session');
        $instance->security = $this->get('security.context');
        return $instance;
    }
    protected function getGdr_PersonageService()
    {
        $this->services['gdr.personage'] = $instance = new \Gdr\UserBundle\Service\PersonageService();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        $instance->general = $this->get('gdr.game_bundle.general');
        $instance->permission = $this->get('gdr.permission');
        return $instance;
    }
    protected function getGdr_Player_NotifyRandomSkillService()
    {
        return $this->services['gdr.player.notify_random_skill'] = new \Gdr\GameBundle\Listener\Trainer\NotifyRandomSkillAssigned($this->get('gdr.notifier.letter'), $this->get('templating'));
    }
    protected function getGdr_Player_Skill_RandomService()
    {
        return $this->services['gdr.player.skill.random'] = new \Gdr\GameBundle\Service\Personage\Trainer\RandomSkill($this->get('doctrine.orm.default_entity_manager'), $this->get('event_dispatcher'));
    }
    protected function getGdr_Player_SkillerService()
    {
        return $this->services['gdr.player.skiller'] = new \Gdr\GameBundle\Service\Personage\Trainer\Skiller($this->get('doctrine.orm.default_entity_manager'));
    }
    protected function getGdr_Race_ServiceService()
    {
        return $this->services['gdr.race.service'] = new \Gdr\RaceBundle\Service\Service($this->get('doctrine'), $this->get('gdr.game_bundle.general'), $this->get('templating'));
    }
    protected function getGdr_ReferrerService()
    {
        $this->services['gdr.referrer'] = $instance = new \Gdr\GameBundle\Service\ReferrerService();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        $instance->general = $this->get('gdr.game_bundle.general');
        return $instance;
    }
    protected function getGdr_TradingService()
    {
        return $this->services['gdr.trading'] = new \Gdr\GameBundle\Service\Money\Trading($this->get('doctrine.orm.default_entity_manager'), $this->get('gdr.banklogger'));
    }
    protected function getGdr_UserBundle_Validator_Constraint_CharsUsernameValidatorService()
    {
        return $this->services['gdr.user_bundle.validator.constraint.chars_username_validator'] = new \Gdr\UserBundle\Validator\Constraint\CharsUsernameValidator();
    }
    protected function getGdr_UserBundle_Validator_Constraint_UsableUsernameValidatorService()
    {
        $this->services['gdr.user_bundle.validator.constraint.usable_username_validator'] = $instance = new \Gdr\UserBundle\Validator\Constraint\UsableUsernameValidator();
        $instance->em = $this->get('doctrine.orm.default_entity_manager');
        return $instance;
    }
    protected function getGdrAdministration_Form_Type_AdminFileService()
    {
        return $this->services['gdr_administration.form.type.admin_file'] = new \Gdr\AdministrationBundle\Form\Type\AdminFileType();
    }
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\DependencyInjection\ContainerAwareHttpKernel($this->get('event_dispatcher'), $this, $this->get('jms_di_extra.controller_resolver'), $this->get('request_stack'), false);
    }
    protected function getIvoryCkEditor_ConfigManagerService()
    {
        $this->services['ivory_ck_editor.config_manager'] = $instance = new \Ivory\CKEditorBundle\Model\ConfigManager();
        $instance->setConfig('base', array('toolbar' => array(0 => array(0 => 'Cut', 1 => 'Copy', 2 => 'Paste', 3 => 'PasteText', 4 => 'PasteFromWord', 5 => '-', 6 => 'Undo', 7 => 'Redo'), 1 => array(0 => 'Find', 1 => 'Replace', 2 => '-', 3 => 'SelectAll', 4 => '-'), 2 => '/', 3 => array(0 => 'Bold', 1 => 'Italic', 2 => 'Underline', 3 => 'Strike', 4 => 'Subscript', 5 => 'Superscript', 6 => '-', 7 => 'RemoveFormat', 8 => '-'), 4 => '-', 5 => array(0 => 'Styles', 1 => 'Format', 2 => 'Font', 3 => 'FontSize', 4 => 'TextColor', 5 => 'Image'), 6 => '-', 7 => array(0 => 'NumberedList', 1 => 'BulletedList', 2 => '-', 3 => 'Outdent', 4 => 'Indent', 5 => '-', 6 => 'JustifyLeft', 7 => 'JustifyCenter', 8 => 'JustifyRight', 9 => 'JustifyBlock'))));
        return $instance;
    }
    protected function getIvoryCkEditor_Form_TypeService()
    {
        return $this->services['ivory_ck_editor.form.type'] = new \Ivory\CKEditorBundle\Form\Type\CKEditorType(true, 'bundles/ivoryckeditor/', 'bundles/ivoryckeditor/ckeditor.js', $this->get('ivory_ck_editor.config_manager'), $this->get('ivory_ck_editor.plugin_manager'), $this->get('ivory_ck_editor.styles_set_manager'), $this->get('ivory_ck_editor.template_manager'));
    }
    protected function getIvoryCkEditor_Helper_AssetsVersionTrimerService()
    {
        return $this->services['ivory_ck_editor.helper.assets_version_trimer'] = new \Ivory\CKEditorBundle\Helper\AssetsVersionTrimerHelper();
    }
    protected function getIvoryCkEditor_Helper_TemplatingService()
    {
        return $this->services['ivory_ck_editor.helper.templating'] = new \Ivory\CKEditorBundle\Helper\CKEditorHelper($this);
    }
    protected function getIvoryCkEditor_PluginManagerService()
    {
        return $this->services['ivory_ck_editor.plugin_manager'] = new \Ivory\CKEditorBundle\Model\PluginManager();
    }
    protected function getIvoryCkEditor_StylesSetManagerService()
    {
        return $this->services['ivory_ck_editor.styles_set_manager'] = new \Ivory\CKEditorBundle\Model\StylesSetManager();
    }
    protected function getIvoryCkEditor_TemplateManagerService()
    {
        return $this->services['ivory_ck_editor.template_manager'] = new \Ivory\CKEditorBundle\Model\TemplateManager();
    }
    protected function getIvoryCkEditor_TwigExtensionService()
    {
        return $this->services['ivory_ck_editor.twig_extension'] = new \Ivory\CKEditorBundle\Twig\CKEditorExtension($this->get('ivory_ck_editor.helper.templating'));
    }
    protected function getJmsAop_InterceptorLoaderService()
    {
        return $this->services['jms_aop.interceptor_loader'] = new \JMS\AopBundle\Aop\InterceptorLoader($this, array());
    }
    protected function getJmsAop_PointcutContainerService()
    {
        return $this->services['jms_aop.pointcut_container'] = new \JMS\AopBundle\Aop\PointcutContainer(array('security.access.method_interceptor' => $this->get('security.access.pointcut')));
    }
    protected function getJmsDiExtra_Metadata_ConverterService()
    {
        return $this->services['jms_di_extra.metadata.converter'] = new \JMS\DiExtraBundle\Metadata\MetadataConverter();
    }
    protected function getJmsDiExtra_Metadata_MetadataFactoryService()
    {
        $this->services['jms_di_extra.metadata.metadata_factory'] = $instance = new \Metadata\MetadataFactory(new \Metadata\Driver\LazyLoadingDriver($this, 'jms_di_extra.metadata_driver'), 'Metadata\\ClassHierarchyMetadata', false);
        $instance->setCache(new \Metadata\Cache\FileCache((__DIR__.'/jms_diextra/metadata')));
        return $instance;
    }
    protected function getJmsDiExtra_MetadataDriverService()
    {
        return $this->services['jms_di_extra.metadata_driver'] = new \JMS\DiExtraBundle\Metadata\Driver\AnnotationDriver($this->get('annotation_reader'), $this->get('jms_di_extra.service_naming_strategy'));
    }
    protected function getJmsDiExtra_ServiceNamingStrategyService()
    {
        return $this->services['jms_di_extra.service_naming_strategy'] = new \JMS\DiExtraBundle\Metadata\DefaultNamingStrategy();
    }
    protected function getJmsSerializerService()
    {
        $a = new \Metadata\MetadataFactory(new \Metadata\Driver\LazyLoadingDriver($this, 'jms_serializer.metadata_driver'), 'Metadata\\ClassHierarchyMetadata', false);
        $a->setCache(new \Metadata\Cache\FileCache((__DIR__.'/jms_serializer')));
        $b = new \JMS\Serializer\EventDispatcher\LazyEventDispatcher($this);
        $b->setListeners(array('serializer.pre_serialize' => array(0 => array(0 => array(0 => 'jms_serializer.doctrine_proxy_subscriber', 1 => 'onPreSerialize'), 1 => NULL, 2 => NULL))));
        return $this->services['jms_serializer'] = new \JMS\Serializer\Serializer($a, $this->get('jms_serializer.handler_registry'), $this->get('jms_serializer.unserialize_object_constructor'), new \JMS\DiExtraBundle\DependencyInjection\Collection\LazyServiceMap($this, array('json' => 'jms_serializer.json_serialization_visitor', 'xml' => 'jms_serializer.xml_serialization_visitor', 'yml' => 'jms_serializer.yaml_serialization_visitor')), new \JMS\DiExtraBundle\DependencyInjection\Collection\LazyServiceMap($this, array('json' => 'jms_serializer.json_deserialization_visitor', 'xml' => 'jms_serializer.xml_deserialization_visitor')), $b);
    }
    protected function getJmsSerializer_ArrayCollectionHandlerService()
    {
        return $this->services['jms_serializer.array_collection_handler'] = new \JMS\Serializer\Handler\ArrayCollectionHandler();
    }
    protected function getJmsSerializer_ConstraintViolationHandlerService()
    {
        return $this->services['jms_serializer.constraint_violation_handler'] = new \JMS\Serializer\Handler\ConstraintViolationHandler();
    }
    protected function getJmsSerializer_DatetimeHandlerService()
    {
        return $this->services['jms_serializer.datetime_handler'] = new \JMS\Serializer\Handler\DateHandler('Y-m-d\\TH:i:sO', 'Europe/Rome', true);
    }
    protected function getJmsSerializer_DoctrineProxySubscriberService()
    {
        return $this->services['jms_serializer.doctrine_proxy_subscriber'] = new \JMS\Serializer\EventDispatcher\Subscriber\DoctrineProxySubscriber();
    }
    protected function getJmsSerializer_FormErrorHandlerService()
    {
        return $this->services['jms_serializer.form_error_handler'] = new \JMS\Serializer\Handler\FormErrorHandler($this->get('translator.default'));
    }
    protected function getJmsSerializer_HandlerRegistryService()
    {
        return $this->services['jms_serializer.handler_registry'] = new \JMS\Serializer\Handler\LazyHandlerRegistry($this, array(2 => array('DateTime' => array('json' => array(0 => 'jms_serializer.datetime_handler', 1 => 'deserializeDateTimeFromjson'), 'xml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'deserializeDateTimeFromxml'), 'yml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'deserializeDateTimeFromyml')), 'ArrayCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'Doctrine\\Common\\Collections\\ArrayCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'Doctrine\\ORM\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'Doctrine\\ODM\\MongoDB\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'Doctrine\\ODM\\PHPCR\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'deserializeCollection')), 'PhpCollection\\Sequence' => array('json' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeSequence'), 'xml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeSequence'), 'yml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeSequence')), 'PhpCollection\\Map' => array('json' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeMap'), 'xml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeMap'), 'yml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'deserializeMap'))), 1 => array('DateTime' => array('json' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateTime'), 'xml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateTime'), 'yml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateTime')), 'DateInterval' => array('json' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateInterval'), 'xml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateInterval'), 'yml' => array(0 => 'jms_serializer.datetime_handler', 1 => 'serializeDateInterval')), 'ArrayCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'Doctrine\\Common\\Collections\\ArrayCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'Doctrine\\ORM\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'Doctrine\\ODM\\MongoDB\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'Doctrine\\ODM\\PHPCR\\PersistentCollection' => array('json' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'xml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection'), 'yml' => array(0 => 'jms_serializer.array_collection_handler', 1 => 'serializeCollection')), 'PhpCollection\\Sequence' => array('json' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeSequence'), 'xml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeSequence'), 'yml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeSequence')), 'PhpCollection\\Map' => array('json' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeMap'), 'xml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeMap'), 'yml' => array(0 => 'jms_serializer.php_collection_handler', 1 => 'serializeMap')), 'Symfony\\Component\\Form\\Form' => array('xml' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormToxml'), 'json' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormTojson'), 'yml' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormToyml')), 'Symfony\\Component\\Form\\FormError' => array('xml' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormErrorToxml'), 'json' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormErrorTojson'), 'yml' => array(0 => 'jms_serializer.form_error_handler', 1 => 'serializeFormErrorToyml')), 'Symfony\\Component\\Validator\\ConstraintViolationList' => array('xml' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeListToxml'), 'json' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeListTojson'), 'yml' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeListToyml')), 'Symfony\\Component\\Validator\\ConstraintViolation' => array('xml' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeViolationToxml'), 'json' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeViolationTojson'), 'yml' => array(0 => 'jms_serializer.constraint_violation_handler', 1 => 'serializeViolationToyml')))));
    }
    protected function getJmsSerializer_JsonDeserializationVisitorService()
    {
        return $this->services['jms_serializer.json_deserialization_visitor'] = new \JMS\Serializer\JsonDeserializationVisitor($this->get('jms_serializer.naming_strategy'), $this->get('jms_serializer.unserialize_object_constructor'));
    }
    protected function getJmsSerializer_JsonSerializationVisitorService()
    {
        $this->services['jms_serializer.json_serialization_visitor'] = $instance = new \JMS\Serializer\JsonSerializationVisitor($this->get('jms_serializer.naming_strategy'));
        $instance->setOptions(0);
        return $instance;
    }
    protected function getJmsSerializer_MetadataDriverService()
    {
        $a = new \Metadata\Driver\FileLocator(array('Symfony\\Bundle\\FrameworkBundle' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/config/serializer'), 'Symfony\\Bundle\\SecurityBundle' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/config/serializer'), 'Symfony\\Bundle\\TwigBundle' => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/config/serializer'), 'Symfony\\Bundle\\MonologBundle' => ($this->targetDirs[3].'/vendor/symfony/monolog-bundle/Resources/config/serializer'), 'Symfony\\Bundle\\SwiftmailerBundle' => ($this->targetDirs[3].'/vendor/symfony/swiftmailer-bundle/Resources/config/serializer'), 'Symfony\\Bundle\\AsseticBundle' => ($this->targetDirs[3].'/vendor/symfony/assetic-bundle/Resources/config/serializer'), 'Doctrine\\Bundle\\DoctrineBundle' => ($this->targetDirs[3].'/vendor/doctrine/doctrine-bundle/Resources/config/serializer'), 'Sensio\\Bundle\\FrameworkExtraBundle' => ($this->targetDirs[3].'/vendor/sensio/framework-extra-bundle/Resources/config/serializer'), 'JMS\\AopBundle' => ($this->targetDirs[3].'/vendor/jms/aop-bundle/Resources/config/serializer'), 'JMS\\DiExtraBundle' => ($this->targetDirs[3].'/vendor/jms/di-extra-bundle/Resources/config/serializer'), 'JMS\\SecurityExtraBundle' => ($this->targetDirs[3].'/vendor/jms/security-extra-bundle/Resources/config/serializer'), 'Doctrine\\Bundle\\FixturesBundle' => ($this->targetDirs[3].'/vendor/doctrine/doctrine-fixtures-bundle/Resources/config/serializer'), 'Stof\\DoctrineExtensionsBundle' => ($this->targetDirs[3].'/vendor/stof/doctrine-extensions-bundle/Resources/config/serializer'), 'Ivory\\CKEditorBundle' => ($this->targetDirs[3].'/vendor/egeloen/ckeditor-bundle/Ivory/CKEditorBundle/Resources/config/serializer'), 'FOS\\JsRoutingBundle' => ($this->targetDirs[3].'/vendor/friendsofsymfony/jsrouting-bundle/Resources/config/serializer'), 'Vich\\UploaderBundle' => ($this->targetDirs[3].'/vendor/vich/uploader-bundle/Resources/config/serializer'), 'JMS\\SerializerBundle' => ($this->targetDirs[3].'/vendor/jms/serializer-bundle/JMS/SerializerBundle/Resources/config/serializer'), 'Exercise\\HTMLPurifierBundle' => ($this->targetDirs[3].'/vendor/exercise/htmlpurifier-bundle/Resources/config/serializer'), 'Erivello\\SimpleHtmlDomBundle' => ($this->targetDirs[3].'/vendor/erivello/simple-html-dom-bundle/Erivello/SimpleHtmlDomBundle/Resources/config/serializer'), 'Knp\\Bundle\\PaginatorBundle' => ($this->targetDirs[3].'/vendor/knplabs/knp-paginator-bundle/Resources/config/serializer'), 'Gdr\\SiteBundle' => ($this->targetDirs[3].'/src/Gdr/SiteBundle/Resources/config/serializer'), 'Gdr\\UserBundle' => ($this->targetDirs[3].'/src/Gdr/UserBundle/Resources/config/serializer'), 'Gdr\\GameBundle' => ($this->targetDirs[3].'/src/Gdr/GameBundle/Resources/config/serializer'), 'Gdr\\RaceBundle' => ($this->targetDirs[3].'/src/Gdr/RaceBundle/Resources/config/serializer'), 'Gdr\\AvatarBundle' => ($this->targetDirs[3].'/src/Gdr/AvatarBundle/Resources/config/serializer'), 'Gdr\\ItemsBundle' => ($this->targetDirs[3].'/src/Gdr/ItemsBundle/Resources/config/serializer'), 'Gdr\\AdministrationBundle' => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/config/serializer'), 'Gdr\\MeteoBundle' => ($this->targetDirs[3].'/src/Gdr/MeteoBundle/Resources/config/serializer')));
        return $this->services['jms_serializer.metadata_driver'] = new \JMS\Serializer\Metadata\Driver\DoctrineTypeDriver(new \Metadata\Driver\DriverChain(array(0 => new \JMS\Serializer\Metadata\Driver\YamlDriver($a), 1 => new \JMS\Serializer\Metadata\Driver\XmlDriver($a), 2 => new \JMS\Serializer\Metadata\Driver\PhpDriver($a), 3 => new \JMS\Serializer\Metadata\Driver\AnnotationDriver($this->get('annotation_reader')))), $this->get('doctrine'));
    }
    protected function getJmsSerializer_NamingStrategyService()
    {
        return $this->services['jms_serializer.naming_strategy'] = new \JMS\Serializer\Naming\CacheNamingStrategy(new \JMS\Serializer\Naming\SerializedNameAnnotationStrategy(new \JMS\Serializer\Naming\CamelCaseNamingStrategy('_', true)));
    }
    protected function getJmsSerializer_ObjectConstructorService()
    {
        return $this->services['jms_serializer.object_constructor'] = new \JMS\Serializer\Construction\DoctrineObjectConstructor($this->get('doctrine'), $this->get('jms_serializer.unserialize_object_constructor'));
    }
    protected function getJmsSerializer_PhpCollectionHandlerService()
    {
        return $this->services['jms_serializer.php_collection_handler'] = new \JMS\Serializer\Handler\PhpCollectionHandler();
    }
    protected function getJmsSerializer_Templating_Helper_SerializerService()
    {
        return $this->services['jms_serializer.templating.helper.serializer'] = new \JMS\SerializerBundle\Templating\SerializerHelper($this->get('jms_serializer'));
    }
    protected function getJmsSerializer_XmlDeserializationVisitorService()
    {
        $this->services['jms_serializer.xml_deserialization_visitor'] = $instance = new \JMS\Serializer\XmlDeserializationVisitor($this->get('jms_serializer.naming_strategy'), $this->get('jms_serializer.unserialize_object_constructor'));
        $instance->setDoctypeWhitelist(array());
        return $instance;
    }
    protected function getJmsSerializer_XmlSerializationVisitorService()
    {
        return $this->services['jms_serializer.xml_serialization_visitor'] = new \JMS\Serializer\XmlSerializationVisitor($this->get('jms_serializer.naming_strategy'));
    }
    protected function getJmsSerializer_YamlSerializationVisitorService()
    {
        return $this->services['jms_serializer.yaml_serialization_visitor'] = new \JMS\Serializer\YamlSerializationVisitor($this->get('jms_serializer.naming_strategy'));
    }
    protected function getKernelService()
    {
        throw new RuntimeException('You have requested a synthetic service ("kernel"). The DIC does not know how to construct this service.');
    }
    protected function getKernel_ClassCache_CacheWarmerService()
    {
        return $this->services['kernel.class_cache.cache_warmer'] = new \Symfony\Bundle\FrameworkBundle\CacheWarmer\ClassCacheCacheWarmer();
    }
    protected function getKnpPaginatorService()
    {
        $this->services['knp_paginator'] = $instance = new \Knp\Component\Pager\Paginator($this->get('event_dispatcher'));
        $instance->setDefaultPaginatorOptions(array('pageParameterName' => 'page', 'sortFieldParameterName' => 'sort', 'sortDirectionParameterName' => 'direction', 'filterFieldParameterName' => 'filterField', 'filterValueParameterName' => 'filterValue', 'distinct' => true));
        return $instance;
    }
    protected function getKnpPaginator_Helper_ProcessorService()
    {
        return $this->services['knp_paginator.helper.processor'] = new \Knp\Bundle\PaginatorBundle\Helper\Processor($this->get('router'), $this->get('translator.default'));
    }
    protected function getKnpPaginator_Subscriber_FiltrationService()
    {
        return $this->services['knp_paginator.subscriber.filtration'] = new \Knp\Component\Pager\Event\Subscriber\Filtration\FiltrationSubscriber();
    }
    protected function getKnpPaginator_Subscriber_PaginateService()
    {
        return $this->services['knp_paginator.subscriber.paginate'] = new \Knp\Component\Pager\Event\Subscriber\Paginate\PaginationSubscriber();
    }
    protected function getKnpPaginator_Subscriber_SlidingPaginationService()
    {
        return $this->services['knp_paginator.subscriber.sliding_pagination'] = new \Knp\Bundle\PaginatorBundle\Subscriber\SlidingPaginationSubscriber(array('defaultPaginationTemplate' => 'GdrGameBundle:Default:paginator.html.twig', 'defaultSortableTemplate' => 'KnpPaginatorBundle:Pagination:sortable_link.html.twig', 'defaultFiltrationTemplate' => 'KnpPaginatorBundle:Pagination:filtration.html.twig', 'defaultPageRange' => 5));
    }
    protected function getKnpPaginator_Subscriber_SortableService()
    {
        return $this->services['knp_paginator.subscriber.sortable'] = new \Knp\Component\Pager\Event\Subscriber\Sortable\SortableSubscriber();
    }
    protected function getKnpPaginator_Twig_Extension_PaginationService()
    {
        return $this->services['knp_paginator.twig.extension.pagination'] = new \Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension($this->get('knp_paginator.helper.processor'));
    }
    protected function getLocaleListenerService()
    {
        return $this->services['locale_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleListener($this->get('request_stack'), 'it', $this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getLoggerService()
    {
        $this->services['logger'] = $instance = new \Symfony\Bridge\Monolog\Logger('app');
        $instance->pushProcessor(array(0 => $this->get('monolog.processor.ip_request'), 1 => 'processRecord'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getMonolog_Formatter_IpRequestService()
    {
        return $this->services['monolog.formatter.ip_request'] = new \Monolog\Formatter\LineFormatter('[%datetime%] [%extra.ip%] %channel%.%level_name%: %message%
');
    }
    protected function getMonolog_Handler_CronService()
    {
        return $this->services['monolog.handler.cron'] = new \Monolog\Handler\StreamHandler(($this->targetDirs[2].'/logs/cron.log'), 200, true, NULL);
    }
    protected function getMonolog_Handler_GroupedService()
    {
        return $this->services['monolog.handler.grouped'] = new \Monolog\Handler\GroupHandler(array(0 => $this->get('monolog.handler.streamed'), 1 => $this->get('monolog.handler.swift')), true);
    }
    protected function getMonolog_Handler_MainService()
    {
        $this->services['monolog.handler.main'] = $instance = new \Monolog\Handler\FingersCrossedHandler($this->get('monolog.handler.grouped'), 400, 0, true, true, NULL);
        $instance->setFormatter($this->get('monolog.formatter.ip_request'));
        return $instance;
    }
    protected function getMonolog_Handler_StreamedService()
    {
        return $this->services['monolog.handler.streamed'] = new \Monolog\Handler\StreamHandler(($this->targetDirs[2].'/logs/prod.log'), 100, true, NULL);
    }
    protected function getMonolog_Handler_SwiftService()
    {
        $this->services['monolog.handler.swift'] = $instance = new \Symfony\Bridge\Monolog\Handler\SwiftMailerHandler($this->get('swiftmailer.mailer.default'), array(0 => $this->get('monolog.handler.swift.mail_message_factory'), 1 => 'createMessage'), 400, true);
        $instance->setFormatter($this->get('monolog.formatter.ip_request'));
        $instance->setTransport($this->get('swiftmailer.mailer.default.transport.real'));
        return $instance;
    }
    protected function getMonolog_Logger_AsseticService()
    {
        $this->services['monolog.logger.assetic'] = $instance = new \Symfony\Bridge\Monolog\Logger('assetic');
        $instance->pushProcessor(array(0 => $this->get('monolog.processor.ip_request'), 1 => 'processRecord'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getMonolog_Logger_CronService()
    {
        $this->services['monolog.logger.cron'] = $instance = new \Symfony\Bridge\Monolog\Logger('cron');
        $instance->pushProcessor(array(0 => $this->get('monolog.processor.ip_request'), 1 => 'processRecord'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        $instance->pushHandler($this->get('monolog.handler.cron'));
        return $instance;
    }
    protected function getMonolog_Logger_DoctrineService()
    {
        $this->services['monolog.logger.doctrine'] = $instance = new \Symfony\Bridge\Monolog\Logger('doctrine');
        $instance->pushProcessor(array(0 => $this->get('monolog.processor.ip_request'), 1 => 'processRecord'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getMonolog_Logger_PhpService()
    {
        $this->services['monolog.logger.php'] = $instance = new \Symfony\Bridge\Monolog\Logger('php');
        $instance->pushProcessor(array(0 => $this->get('monolog.processor.ip_request'), 1 => 'processRecord'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getMonolog_Logger_RequestService()
    {
        $this->services['monolog.logger.request'] = $instance = new \Symfony\Bridge\Monolog\Logger('request');
        $instance->pushProcessor(array(0 => $this->get('monolog.processor.ip_request'), 1 => 'processRecord'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getMonolog_Logger_RouterService()
    {
        $this->services['monolog.logger.router'] = $instance = new \Symfony\Bridge\Monolog\Logger('router');
        $instance->pushProcessor(array(0 => $this->get('monolog.processor.ip_request'), 1 => 'processRecord'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getMonolog_Logger_SecurityService()
    {
        $this->services['monolog.logger.security'] = $instance = new \Symfony\Bridge\Monolog\Logger('security');
        $instance->pushProcessor(array(0 => $this->get('monolog.processor.ip_request'), 1 => 'processRecord'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getMonolog_Logger_TranslationService()
    {
        $this->services['monolog.logger.translation'] = $instance = new \Symfony\Bridge\Monolog\Logger('translation');
        $instance->pushProcessor(array(0 => $this->get('monolog.processor.ip_request'), 1 => 'processRecord'));
        $instance->pushHandler($this->get('monolog.handler.main'));
        return $instance;
    }
    protected function getMonolog_Processor_IpRequestService()
    {
        return $this->services['monolog.processor.ip_request'] = new \Gdr\GameBundle\IpRequestProcessor($this);
    }
    protected function getPropertyAccessorService()
    {
        return $this->services['property_accessor'] = new \Symfony\Component\PropertyAccess\PropertyAccessor(false, false);
    }
    protected function getRequestService()
    {
        if (!isset($this->scopedServices['request'])) {
            throw new InactiveScopeException('request', 'request');
        }
        throw new RuntimeException('You have requested a synthetic service ("request"). The DIC does not know how to construct this service.');
    }
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack();
    }
    protected function getResponseListenerService()
    {
        return $this->services['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8');
    }
    protected function getRouterService()
    {
        $this->services['router'] = $instance = new \Symfony\Bundle\FrameworkBundle\Routing\Router($this, ($this->targetDirs[2].'/config/routing.yml'), array('cache_dir' => __DIR__, 'debug' => false, 'generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator', 'generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper', 'generator_cache_class' => 'appProdUrlGenerator', 'matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher', 'matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper', 'matcher_cache_class' => 'appProdUrlMatcher', 'strict_requirements' => NULL), $this->get('router.request_context', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('monolog.logger.router', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $instance->setConfigCacheFactory($this->get('config_cache_factory'));
        return $instance;
    }
    protected function getRouterListenerService()
    {
        return $this->services['router_listener'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener($this->get('router'), $this->get('request_stack'), $this->get('router.request_context', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('monolog.logger.request', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getRouting_LoaderService()
    {
        $a = $this->get('file_locator');
        $b = $this->get('annotation_reader');
        $c = new \Sensio\Bundle\FrameworkExtraBundle\Routing\AnnotatedRouteControllerLoader($b);
        $d = new \Symfony\Component\Config\Loader\LoaderResolver();
        $d->addLoader(new \Symfony\Component\Routing\Loader\XmlFileLoader($a));
        $d->addLoader(new \Symfony\Component\Routing\Loader\YamlFileLoader($a));
        $d->addLoader(new \Symfony\Component\Routing\Loader\PhpFileLoader($a));
        $d->addLoader(new \Symfony\Component\Routing\Loader\DirectoryLoader($a));
        $d->addLoader(new \Symfony\Component\Routing\Loader\DependencyInjection\ServiceRouterLoader($this));
        $d->addLoader(new \Symfony\Component\Routing\Loader\AnnotationDirectoryLoader($a, $c));
        $d->addLoader(new \Symfony\Component\Routing\Loader\AnnotationFileLoader($a, $c));
        $d->addLoader($c);
        return $this->services['routing.loader'] = new \Symfony\Bundle\FrameworkBundle\Routing\DelegatingLoader($this->get('controller_name_converter'), $d);
    }
    protected function getSecurity_Access_DecisionManagerService()
    {
        $a = $this->get('security.authentication.trust_resolver');
        $b = $this->get('security.role_hierarchy');
        $c = new \JMS\SecurityExtraBundle\Security\Authorization\Expression\LazyLoadingExpressionVoter($this->get('security.expressions.handler'), $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $c->setLazyCompiler($this, 'security.expressions.compiler');
        $c->setCacheDir((__DIR__.'/jms_security/expressions'));
        $d = new \Symfony\Component\Security\Core\Authorization\AccessDecisionManager(array(), 'affirmative', false, true);
        $d->setVoters(array(0 => $c, 1 => new \Symfony\Component\Security\Core\Authorization\Voter\ExpressionVoter(new \Symfony\Component\Security\Core\Authorization\ExpressionLanguage(), $a, $b), 2 => new \Symfony\Component\Security\Core\Authorization\Voter\RoleHierarchyVoter($b), 3 => new \Symfony\Component\Security\Core\Authorization\Voter\AuthenticatedVoter($a)));
        return $this->services['security.access.decision_manager'] = new \JMS\SecurityExtraBundle\Security\Authorization\RememberingAccessDecisionManager($d);
    }
    protected function getSecurity_Access_MethodInterceptorService()
    {
        return $this->services['security.access.method_interceptor'] = new \JMS\SecurityExtraBundle\Security\Authorization\Interception\MethodSecurityInterceptor($this->get('security.token_storage'), $this->get('security.authentication.manager'), $this->get('security.access.decision_manager'), new \JMS\SecurityExtraBundle\Security\Authorization\AfterInvocation\AfterInvocationManager(array()), new \JMS\SecurityExtraBundle\Security\Authorization\RunAsManager('RunAsToken', 'ROLE_'), $this->get('security.extra.metadata_factory'), $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSecurity_Access_PointcutService()
    {
        $this->services['security.access.pointcut'] = $instance = new \JMS\SecurityExtraBundle\Security\Authorization\Interception\SecurityPointcut($this->get('security.extra.metadata_factory'), false, array());
        $instance->setSecuredClasses(array());
        return $instance;
    }
    protected function getSecurity_Authentication_GuardHandlerService()
    {
        return $this->services['security.authentication.guard_handler'] = new \Symfony\Component\Security\Guard\GuardAuthenticatorHandler($this->get('security.token_storage'), $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSecurity_Authentication_TrustResolverService()
    {
        return $this->services['security.authentication.trust_resolver'] = new \Symfony\Component\Security\Core\Authentication\AuthenticationTrustResolver('Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken', 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken');
    }
    protected function getSecurity_AuthenticationUtilsService()
    {
        return $this->services['security.authentication_utils'] = new \Symfony\Component\Security\Http\Authentication\AuthenticationUtils($this->get('request_stack'));
    }
    protected function getSecurity_AuthorizationCheckerService()
    {
        return $this->services['security.authorization_checker'] = new \Symfony\Component\Security\Core\Authorization\AuthorizationChecker($this->get('security.token_storage'), $this->get('security.authentication.manager'), $this->get('security.access.decision_manager'), false);
    }
    protected function getSecurity_ContextService()
    {
        @trigger_error('The "security.context" service is deprecated since Symfony 2.6 and will be removed in 3.0.', E_USER_DEPRECATED);
        return $this->services['security.context'] = new \Symfony\Component\Security\Core\SecurityContext($this->get('security.token_storage'), $this->get('security.authorization_checker'));
    }
    protected function getSecurity_Csrf_TokenManagerService()
    {
        return $this->services['security.csrf.token_manager'] = new \Symfony\Component\Security\Csrf\CsrfTokenManager(new \Symfony\Component\Security\Csrf\TokenGenerator\UriSafeTokenGenerator(), new \Symfony\Component\Security\Csrf\TokenStorage\SessionTokenStorage($this->get('session')));
    }
    protected function getSecurity_EncoderFactoryService()
    {
        return $this->services['security.encoder_factory'] = new \Symfony\Component\Security\Core\Encoder\EncoderFactory(array('Gdr\\UserBundle\\Entity\\User' => array('class' => 'Symfony\\Component\\Security\\Core\\Encoder\\MessageDigestPasswordEncoder', 'arguments' => array(0 => 'sha512', 1 => true, 2 => 5000))));
    }
    protected function getSecurity_Expressions_CompilerService()
    {
        $a = new \JMS\SecurityExtraBundle\Security\Authorization\Expression\Compiler\ContainerAwareVariableCompiler();
        $a->setMaps(array('trust_resolver' => 'security.authentication.trust_resolver', 'role_hierarchy' => 'security.role_hierarchy', 'permission_evaluator' => 'security.acl.permission_evaluator', 'security_context' => 'security.context', 'token_storage' => 'security.token_storage', 'authorization_checker' => 'security.authorization_checker'), array());
        $this->services['security.expressions.compiler'] = $instance = new \JMS\SecurityExtraBundle\Security\Authorization\Expression\ExpressionCompiler();
        $instance->addFunctionCompiler(new \JMS\SecurityExtraBundle\Security\Acl\Expression\HasPermissionFunctionCompiler());
        $instance->addFunctionCompiler(new \JMS\SecurityExtraBundle\Security\Acl\Expression\HasClassPermissionFunctionCompiler());
        $instance->addTypeCompiler(new \JMS\SecurityExtraBundle\Security\Authorization\Expression\Compiler\ParameterExpressionCompiler());
        $instance->addTypeCompiler($a);
        return $instance;
    }
    protected function getSecurity_Expressions_ReverseInterpreterService()
    {
        return $this->services['security.expressions.reverse_interpreter'] = new \JMS\SecurityExtraBundle\Security\Authorization\Expression\ReverseInterpreter($this->get('security.expressions.compiler'), $this->get('security.expressions.handler'));
    }
    protected function getSecurity_Extra_MetadataDriverService()
    {
        return $this->services['security.extra.metadata_driver'] = new \Metadata\Driver\DriverChain(array(0 => new \JMS\SecurityExtraBundle\Metadata\Driver\AnnotationDriver($this->get('annotation_reader'))));
    }
    protected function getSecurity_FirewallService()
    {
        return $this->services['security.firewall'] = new \Symfony\Component\Security\Http\Firewall(new \Symfony\Bundle\SecurityBundle\Security\FirewallMap($this, array('security.firewall.map.context.secured_area' => new \Symfony\Component\HttpFoundation\RequestMatcher('^/'))), $this->get('event_dispatcher'));
    }
    protected function getSecurity_Firewall_Map_Context_SecuredAreaService()
    {
        $a = $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $b = $this->get('security.token_storage');
        $c = $this->get('security.user.provider.concrete.database');
        $d = $this->get('event_dispatcher', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $e = $this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE);
        $f = $this->get('authentication_handler');
        $g = $this->get('http_kernel');
        $h = $this->get('security.authentication.manager');
        $i = $this->get('security.access.decision_manager');
        $j = new \Symfony\Component\HttpFoundation\RequestMatcher('^/gdr/*');
        $k = new \Symfony\Component\HttpFoundation\RequestMatcher('^/login');
        $l = new \Symfony\Component\HttpFoundation\RequestMatcher('^/logout');
        $m = new \Symfony\Component\HttpFoundation\RequestMatcher('^/utente/*');
        $n = new \Symfony\Component\HttpFoundation\RequestMatcher('^/admin/*');
        $o = new \Symfony\Component\HttpFoundation\RequestMatcher('^/gdr/admin/*');
        $p = new \Symfony\Component\Security\Http\AccessMap();
        $p->add($j, array(0 => 'ROLE_USER'), NULL);
        $p->add($k, array(0 => 'IS_AUTHENTICATED_ANONYMOUSLY'), NULL);
        $p->add($l, array(0 => 'ROLE_USER'), NULL);
        $p->add($m, array(0 => 'ROLE_USER'), NULL);
        $p->add($n, array(0 => 'ROLE_ADMIN'), NULL);
        $p->add($o, array(0 => 'ROLE_ADMIN'), NULL);
        $q = new \Symfony\Component\Security\Http\HttpUtils($e, $e);
        $r = new \Symfony\Component\Security\Http\Firewall\LogoutListener($b, $q, $f, array('csrf_parameter' => '_csrf_token', 'csrf_token_id' => 'logout', 'logout_path' => '/logout'));
        $r->addHandler(new \Symfony\Component\Security\Http\Logout\SessionLogoutHandler());
        $s = new \Symfony\Component\Security\Http\Authentication\DefaultAuthenticationFailureHandler($g, $q, array(), $a);
        $s->setOptions(array('login_path' => '/login', 'failure_path' => NULL, 'failure_forward' => false, 'failure_path_parameter' => '_failure_path'));
        return $this->services['security.firewall.map.context.secured_area'] = new \Symfony\Bundle\SecurityBundle\Security\FirewallContext(array(0 => new \Symfony\Component\Security\Http\Firewall\ChannelListener($p, new \Symfony\Component\Security\Http\EntryPoint\RetryAuthenticationEntryPoint(80, 443), $a), 1 => new \Symfony\Component\Security\Http\Firewall\ContextListener($b, array(0 => $c), 'secured_area', $a, $d), 2 => $r, 3 => new \Symfony\Component\Security\Http\Firewall\UsernamePasswordFormAuthenticationListener($b, $h, new \Symfony\Component\Security\Http\Session\SessionAuthenticationStrategy('migrate'), $q, 'secured_area', new \Symfony\Component\Security\Http\Authentication\CustomAuthenticationSuccessHandler($f, array('login_path' => '/login', 'default_target_path' => '/gdr', 'always_use_default_target_path' => false, 'target_path_parameter' => '_target_path', 'use_referer' => false), 'secured_area'), $s, array('check_path' => '/login_check', 'csrf_parameter' => '_csrf_token', 'use_forward' => false, 'require_previous_session' => true, 'username_parameter' => '_username', 'password_parameter' => '_password', 'csrf_token_id' => 'authenticate', 'post_only' => true), $a, $d, $this->get('form.csrf_provider')), 4 => new \Symfony\Component\Security\Http\Firewall\AnonymousAuthenticationListener($b, '593ab854863026.41407377', $a, $h), 5 => new \Symfony\Component\Security\Http\Firewall\SwitchUserListener($b, $c, $this->get('security.user_checker.secured_area'), 'secured_area', $i, $a, '_switch_user', 'ROLE_ALLOWED_TO_SWITCH', $d), 6 => new \Symfony\Component\Security\Http\Firewall\AccessListener($b, $i, $p, $h)), new \Symfony\Component\Security\Http\Firewall\ExceptionListener($b, $this->get('security.authentication.trust_resolver'), $q, 'secured_area', new \Symfony\Component\Security\Http\EntryPoint\FormAuthenticationEntryPoint($g, $q, '/login', false), NULL, NULL, $a, false));
    }
    protected function getSecurity_PasswordEncoderService()
    {
        return $this->services['security.password_encoder'] = new \Symfony\Component\Security\Core\Encoder\UserPasswordEncoder($this->get('security.encoder_factory'));
    }
    protected function getSecurity_Rememberme_ResponseListenerService()
    {
        return $this->services['security.rememberme.response_listener'] = new \Symfony\Component\Security\Http\RememberMe\ResponseListener();
    }
    protected function getSecurity_RoleHierarchyService()
    {
        return $this->services['security.role_hierarchy'] = new \Symfony\Component\Security\Core\Role\RoleHierarchy(array('ROLE_ADMIN' => array(0 => 'ROLE_USER', 1 => 'ROLE_ALLOWED_TO_SWITCH', 2 => 'ROLE_SONATA_ADMIN'), 'ROLE_SUPER_ADMIN' => array(0 => 'ROLE_USER', 1 => 'ROLE_ADMIN', 2 => 'ROLE_ALLOWED_TO_SWITCH', 3 => 'ROLE_SONATA_ADMIN')));
    }
    protected function getSecurity_SecureRandomService()
    {
        @trigger_error('The "security.secure_random" service is deprecated since Symfony 2.8 and will be removed in 3.0. Use the random_bytes() function instead.', E_USER_DEPRECATED);
        return $this->services['security.secure_random'] = new \Symfony\Component\Security\Core\Util\SecureRandom((__DIR__.'/secure_random.seed'), $this->get('monolog.logger.security', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSecurity_TokenStorageService()
    {
        return $this->services['security.token_storage'] = new \Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage();
    }
    protected function getSecurity_UserChecker_SecuredAreaService()
    {
        return $this->services['security.user_checker.secured_area'] = new \Symfony\Component\Security\Core\User\UserChecker();
    }
    protected function getSecurity_Validator_UserPasswordService()
    {
        return $this->services['security.validator.user_password'] = new \Symfony\Component\Security\Core\Validator\Constraints\UserPasswordValidator($this->get('security.token_storage'), $this->get('security.encoder_factory'));
    }
    protected function getSensioFrameworkExtra_Cache_ListenerService()
    {
        return $this->services['sensio_framework_extra.cache.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\HttpCacheListener();
    }
    protected function getSensioFrameworkExtra_Controller_ListenerService()
    {
        return $this->services['sensio_framework_extra.controller.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ControllerListener($this->get('annotation_reader'));
    }
    protected function getSensioFrameworkExtra_Converter_DatetimeService()
    {
        return $this->services['sensio_framework_extra.converter.datetime'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DateTimeParamConverter();
    }
    protected function getSensioFrameworkExtra_Converter_Doctrine_OrmService()
    {
        return $this->services['sensio_framework_extra.converter.doctrine.orm'] = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter($this->get('doctrine', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSensioFrameworkExtra_Converter_ListenerService()
    {
        return $this->services['sensio_framework_extra.converter.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\ParamConverterListener($this->get('sensio_framework_extra.converter.manager'), true);
    }
    protected function getSensioFrameworkExtra_Converter_ManagerService()
    {
        $this->services['sensio_framework_extra.converter.manager'] = $instance = new \Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterManager();
        $instance->add($this->get('sensio_framework_extra.converter.doctrine.orm'), 0, 'doctrine.orm');
        $instance->add($this->get('sensio_framework_extra.converter.datetime'), 0, 'datetime');
        return $instance;
    }
    protected function getSensioFrameworkExtra_Security_ListenerService()
    {
        return $this->services['sensio_framework_extra.security.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\SecurityListener(NULL, new \Sensio\Bundle\FrameworkExtraBundle\Security\ExpressionLanguage(), $this->get('security.authentication.trust_resolver', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('security.role_hierarchy', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('security.token_storage', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('security.authorization_checker', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSensioFrameworkExtra_View_GuesserService()
    {
        return $this->services['sensio_framework_extra.view.guesser'] = new \Sensio\Bundle\FrameworkExtraBundle\Templating\TemplateGuesser($this->get('kernel'));
    }
    protected function getSensioFrameworkExtra_View_ListenerService()
    {
        return $this->services['sensio_framework_extra.view.listener'] = new \Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener($this);
    }
    protected function getServiceContainerService()
    {
        throw new RuntimeException('You have requested a synthetic service ("service_container"). The DIC does not know how to construct this service.');
    }
    protected function getSessionService()
    {
        return $this->services['session'] = new \Symfony\Component\HttpFoundation\Session\Session($this->get('session.storage.native'), new \Symfony\Component\HttpFoundation\Session\Attribute\AttributeBag(), new \Symfony\Component\HttpFoundation\Session\Flash\FlashBag());
    }
    protected function getSession_HandlerService()
    {
        return $this->services['session.handler'] = new \Symfony\Component\HttpFoundation\Session\Storage\Handler\NativeFileSessionHandler(($this->targetDirs[2].'/Sessions/'));
    }
    protected function getSession_SaveListenerService()
    {
        return $this->services['session.save_listener'] = new \Symfony\Component\HttpKernel\EventListener\SaveSessionListener();
    }
    protected function getSession_Storage_FilesystemService()
    {
        return $this->services['session.storage.filesystem'] = new \Symfony\Component\HttpFoundation\Session\Storage\MockFileSessionStorage((__DIR__.'/sessions'), 'MOCKSESSID', $this->get('session.storage.metadata_bag'));
    }
    protected function getSession_Storage_NativeService()
    {
        return $this->services['session.storage.native'] = new \Symfony\Component\HttpFoundation\Session\Storage\NativeSessionStorage(array('cookie_lifetime' => 0, 'cookie_httponly' => false, 'gc_probability' => 1), $this->get('session.handler'), $this->get('session.storage.metadata_bag'));
    }
    protected function getSession_Storage_PhpBridgeService()
    {
        return $this->services['session.storage.php_bridge'] = new \Symfony\Component\HttpFoundation\Session\Storage\PhpBridgeSessionStorage($this->get('session.handler'), $this->get('session.storage.metadata_bag'));
    }
    protected function getSessionListenerService()
    {
        return $this->services['session_listener'] = new \Symfony\Bundle\FrameworkBundle\EventListener\SessionListener($this);
    }
    protected function getSimpleHtmlDomService()
    {
        return $this->services['simple_html_dom'] = new \simple_html_dom();
    }
    protected function getSonata_Admin_Biblioteca_LibriService()
    {
        $this->services['sonata.admin.biblioteca.libri'] = $instance = new \Gdr\AdministrationBundle\Admin\LibraryBookAdmin(NULL, 'Gdr\\GameBundle\\Entity\\LibraryBook', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('LibraryBookAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Biblioteca_SezioniService()
    {
        $this->services['sonata.admin.biblioteca.sezioni'] = $instance = new \Gdr\AdministrationBundle\Admin\LibrarySectionAdmin(NULL, 'Gdr\\GameBundle\\Entity\\LibrarySection', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('LibrarySectionAdmin');
        return $instance;
    }
    protected function getSonata_Admin_EdittoService()
    {
        $this->services['sonata.admin.editto'] = $instance = new \Gdr\AdministrationBundle\Admin\EdittoAdmin(NULL, 'Gdr\\GameBundle\\Entity\\Editto', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('EdittoAdmin');
        return $instance;
    }
    protected function getSonata_Admin_EnclaveService()
    {
        $this->services['sonata.admin.enclave'] = $instance = new \Gdr\AdministrationBundle\Admin\EnclaveAdmin(NULL, 'Gdr\\GameBundle\\Entity\\Enclave', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('EnclaveAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Enclave_CategoryService()
    {
        $this->services['sonata.admin.enclave.category'] = $instance = new \Gdr\AdministrationBundle\Admin\EnclaveCategoryAdmin(NULL, 'Gdr\\GameBundle\\Entity\\EnclaveCategory', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('EnclaviRankAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Enclave_LevelService()
    {
        $this->services['sonata.admin.enclave.level'] = $instance = new \Gdr\AdministrationBundle\Admin\EnclaveLevelAdmin(NULL, 'Gdr\\GameBundle\\Entity\\EnclaveLevel', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('EnclaviLevelAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Enclave_RankService()
    {
        $this->services['sonata.admin.enclave.rank'] = $instance = new \Gdr\AdministrationBundle\Admin\EnclaveRankAdmin(NULL, 'Gdr\\GameBundle\\Entity\\EnclaveRank', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('EnclaveRankAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Enclave_TitleService()
    {
        $this->services['sonata.admin.enclave.title'] = $instance = new \Gdr\AdministrationBundle\Admin\TitleAdmin(NULL, 'Gdr\\UserBundle\\Entity\\Title', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('TitleAdmin');
        return $instance;
    }
    protected function getSonata_Admin_ForumService()
    {
        $this->services['sonata.admin.forum'] = $instance = new \Gdr\AdministrationBundle\Admin\ForumAdmin(NULL, 'Gdr\\GameBundle\\Entity\\Forum', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('ForumAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Forum_CategoryService()
    {
        $this->services['sonata.admin.forum.category'] = $instance = new \Gdr\AdministrationBundle\Admin\ForumCategoryAdmin(NULL, 'Gdr\\GameBundle\\Entity\\ForumCategory', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('ForumCategoryAdmin');
        return $instance;
    }
    protected function getSonata_Admin_GravestoneService()
    {
        $this->services['sonata.admin.gravestone'] = $instance = new \Gdr\AdministrationBundle\Admin\GravestoneAdmin(NULL, 'Gdr\\UserBundle\\Entity\\Gravestone', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('GravestoneAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Grimory_Spell_CategoryService()
    {
        $this->services['sonata.admin.grimory.spell.category'] = $instance = new \Gdr\AdministrationBundle\Admin\SpellCategoryAdmin(NULL, 'Gdr\\UserBundle\\Entity\\SpellCategory', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('SpellCategoryAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Grimory_Spell_SpellsService()
    {
        $this->services['sonata.admin.grimory.spell.spells'] = $instance = new \Gdr\AdministrationBundle\Admin\SpellAdmin(NULL, 'Gdr\\UserBundle\\Entity\\Spell', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('SpellAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Items_ItemService()
    {
        $this->services['sonata.admin.items.item'] = $instance = new \Gdr\AdministrationBundle\Admin\ItemAdmin(NULL, 'Gdr\\ItemsBundle\\Entity\\Item', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('ItemAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Items_ItemtypeService()
    {
        $this->services['sonata.admin.items.itemtype'] = $instance = new \Gdr\AdministrationBundle\Admin\ItemTypeAdmin(NULL, 'Gdr\\ItemsBundle\\Entity\\ItemType', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('ItemTypeAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Items_PropertyService()
    {
        $this->services['sonata.admin.items.property'] = $instance = new \Gdr\AdministrationBundle\Admin\PropertyAdmin(NULL, 'Gdr\\ItemsBundle\\Entity\\Property', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('PropertyAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Items_Property_ItemsService()
    {
        $this->services['sonata.admin.items.property.items'] = $instance = new \Gdr\AdministrationBundle\Admin\PropertyItemAdmin(NULL, 'Gdr\\ItemsBundle\\Entity\\PropertyItem', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('PropertyItemAdmin');
        return $instance;
    }
    protected function getSonata_Admin_LetterService()
    {
        $this->services['sonata.admin.letter'] = $instance = new \Gdr\AdministrationBundle\Admin\LetterAdmin(NULL, 'Gdr\\GameBundle\\Entity\\Letter', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('LetterAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Letter_BackgroundService()
    {
        $this->services['sonata.admin.letter.background'] = $instance = new \Gdr\AdministrationBundle\Admin\LetterBackgroundAdmin(NULL, 'Gdr\\GameBundle\\Entity\\LetterBackground', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('LetterBackgroundAdmin');
        return $instance;
    }
    protected function getSonata_Admin_LocationService()
    {
        $this->services['sonata.admin.location'] = $instance = new \Gdr\AdministrationBundle\Admin\LocationAdmin(NULL, 'Gdr\\GameBundle\\Entity\\Location', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('LocationAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Location_ImageService()
    {
        $this->services['sonata.admin.location.image'] = $instance = new \Gdr\AdministrationBundle\Admin\LocationImageAdmin(NULL, 'Gdr\\GameBundle\\Entity\\LocationImage', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('LocationImageAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Location_TagService()
    {
        $this->services['sonata.admin.location.tag'] = $instance = new \Gdr\AdministrationBundle\Admin\TagChatAdmin(NULL, 'Gdr\\GameBundle\\Entity\\TagChat', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('TagChatAdmin');
        return $instance;
    }
    protected function getSonata_Admin_ManualeService()
    {
        $this->services['sonata.admin.manuale'] = $instance = new \Gdr\AdministrationBundle\Admin\ManualeAdmin(NULL, 'Gdr\\GameBundle\\Entity\\Manuale', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('ManualeAdmin');
        return $instance;
    }
    protected function getSonata_Admin_MarqueService()
    {
        $this->services['sonata.admin.marque'] = $instance = new \Gdr\AdministrationBundle\Admin\MarqueAdmin(NULL, 'Gdr\\GameBundle\\Entity\\Marque', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('MarqueAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Meteo_CombinationService()
    {
        $this->services['sonata.admin.meteo.combination'] = $instance = new \Gdr\AdministrationBundle\Admin\MeteoCombinationAdmin(NULL, 'Gdr\\MeteoBundle\\Entity\\MeteoCombination', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('MeteoCombinationAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Meteo_ConditionService()
    {
        $this->services['sonata.admin.meteo.condition'] = $instance = new \Gdr\AdministrationBundle\Admin\MeteoConditionAdmin(NULL, 'Gdr\\MeteoBundle\\Entity\\MeteoCondition', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('MeteoConditionAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Meteo_MessageService()
    {
        $this->services['sonata.admin.meteo.message'] = $instance = new \Gdr\AdministrationBundle\Admin\MeteoMessageAdmin(NULL, 'Gdr\\MeteoBundle\\Entity\\MeteoMessage', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('MeteoMessageAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Meteo_MonthService()
    {
        $this->services['sonata.admin.meteo.month'] = $instance = new \Gdr\AdministrationBundle\Admin\MeteoMonthAdmin(NULL, 'Gdr\\MeteoBundle\\Entity\\MeteoMonth', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('MeteoMonthAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Meteo_SeasonService()
    {
        $this->services['sonata.admin.meteo.season'] = $instance = new \Gdr\AdministrationBundle\Admin\MeteoSeasonAdmin(NULL, 'Gdr\\MeteoBundle\\Entity\\MeteoSeason', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('MeteoSeasonAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Meteo_StatusService()
    {
        $this->services['sonata.admin.meteo.status'] = $instance = new \Gdr\AdministrationBundle\Admin\MeteoStatusAdmin(NULL, 'Gdr\\MeteoBundle\\Entity\\MeteoStatus', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('MeteoStatusAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Meteo_WindService()
    {
        $this->services['sonata.admin.meteo.wind'] = $instance = new \Gdr\AdministrationBundle\Admin\MeteoWindAdmin(NULL, 'Gdr\\MeteoBundle\\Entity\\MeteoWind', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('MeteoWindAdmin');
        return $instance;
    }
    protected function getSonata_Admin_MoonService()
    {
        $this->services['sonata.admin.moon'] = $instance = new \Gdr\AdministrationBundle\Admin\MoonAdmin(NULL, 'Gdr\\MeteoBundle\\Entity\\Moon', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('MoonAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Moon_StatusService()
    {
        $this->services['sonata.admin.moon.status'] = $instance = new \Gdr\AdministrationBundle\Admin\MoonStatusAdmin(NULL, 'Gdr\\MeteoBundle\\Entity\\MoonStatus', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('MoonStatusAdmin');
        return $instance;
    }
    protected function getSonata_Admin_NewsService()
    {
        $this->services['sonata.admin.news'] = $instance = new \Gdr\AdministrationBundle\Admin\NewsAdmin(NULL, 'Gdr\\AdministrationBundle\\Entity\\News', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('NewsAdmin');
        return $instance;
    }
    protected function getSonata_Admin_RaceService()
    {
        $this->services['sonata.admin.race'] = $instance = new \Gdr\AdministrationBundle\Admin\RaceAdmin(NULL, 'Gdr\\RaceBundle\\Entity\\Race', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('RaceAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Race_EyecolorService()
    {
        $this->services['sonata.admin.race.eyecolor'] = $instance = new \Gdr\AdministrationBundle\Admin\EyeColorAdmin(NULL, 'Gdr\\RaceBundle\\Entity\\EyeColor', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('eyeColor');
        return $instance;
    }
    protected function getSonata_Admin_Race_FurcolorService()
    {
        $this->services['sonata.admin.race.furcolor'] = $instance = new \Gdr\AdministrationBundle\Admin\FurColorAdmin(NULL, 'Gdr\\RaceBundle\\Entity\\FurColor', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('FurColorAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Race_HaircolorService()
    {
        $this->services['sonata.admin.race.haircolor'] = $instance = new \Gdr\AdministrationBundle\Admin\HairColorAdmin(NULL, 'Gdr\\RaceBundle\\Entity\\HairColor', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('HairColorAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Race_LevelService()
    {
        $this->services['sonata.admin.race.level'] = $instance = new \Gdr\AdministrationBundle\Admin\RaceLevelAdmin(NULL, 'Gdr\\RaceBundle\\Entity\\RaceLevel', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('RaceLevelAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Race_SkincolorService()
    {
        $this->services['sonata.admin.race.skincolor'] = $instance = new \Gdr\AdministrationBundle\Admin\SkinColorAdmin(NULL, 'Gdr\\RaceBundle\\Entity\\SkinColor', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('SkinColorAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Race_SquamacolorService()
    {
        $this->services['sonata.admin.race.squamacolor'] = $instance = new \Gdr\AdministrationBundle\Admin\SquamaColorAdmin(NULL, 'Gdr\\RaceBundle\\Entity\\SquamaColor', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('SquamaColorAdmin');
        return $instance;
    }
    protected function getSonata_Admin_UploadService()
    {
        $this->services['sonata.admin.upload'] = $instance = new \Gdr\AdministrationBundle\Admin\UploadAdmin(NULL, 'Gdr\\AdministrationBundle\\Entity\\Upload', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('UploadAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Users_PersonageService()
    {
        $this->services['sonata.admin.users.personage'] = $instance = new \Gdr\AdministrationBundle\Admin\PersonageAdmin(NULL, 'Gdr\\UserBundle\\Entity\\Personage', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('PersonageAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Users_Personage_AchievementService()
    {
        $this->services['sonata.admin.users.personage.achievement'] = $instance = new \Gdr\AdministrationBundle\Admin\AchievementAdmin(NULL, 'Gdr\\UserBundle\\Entity\\Achievement', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('AchievementAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Users_Personage_CombatService()
    {
        $this->services['sonata.admin.users.personage.combat'] = $instance = new \Gdr\AdministrationBundle\Admin\CombatSetAdmin(NULL, 'Gdr\\GameBundle\\Entity\\CombatSet', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('CombatSetAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Users_Personage_EsilioService()
    {
        $this->services['sonata.admin.users.personage.esilio'] = $instance = new \Gdr\AdministrationBundle\Admin\EsilioAdmin(NULL, 'Gdr\\UserBundle\\Entity\\Esilio', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('EsilioAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Users_Personage_ExperiencesService()
    {
        $this->services['sonata.admin.users.personage.experiences'] = $instance = new \Gdr\AdministrationBundle\Admin\ExperienceAdmin(NULL, 'Gdr\\AvatarBundle\\Entity\\Experience', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('ExperienceAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Users_Personage_ForbiddennameService()
    {
        $this->services['sonata.admin.users.personage.forbiddenname'] = $instance = new \Gdr\AdministrationBundle\Admin\ForbiddenNameAdmin(NULL, 'Gdr\\UserBundle\\Entity\\ForbiddenName', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('ForbiddenNameAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Users_Personage_LanguageService()
    {
        $this->services['sonata.admin.users.personage.language'] = $instance = new \Gdr\AdministrationBundle\Admin\LanguageAdmin(NULL, 'Gdr\\UserBundle\\Entity\\Language', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('LanguageAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Users_Personage_SkillService()
    {
        $this->services['sonata.admin.users.personage.skill'] = $instance = new \Gdr\AdministrationBundle\Admin\SkillAdmin(NULL, 'Gdr\\UserBundle\\Entity\\Skill', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('SkillAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Users_Personage_SurnameService()
    {
        $this->services['sonata.admin.users.personage.surname'] = $instance = new \Gdr\AdministrationBundle\Admin\SurnameAdmin(NULL, 'Gdr\\UserBundle\\Entity\\Surname', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('SurnameAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Users_Personage_TypeService()
    {
        $this->services['sonata.admin.users.personage.type'] = $instance = new \Gdr\AdministrationBundle\Admin\PersonageTypeAdmin(NULL, 'Gdr\\UserBundle\\Entity\\PersonageType', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('PersonageTypeAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Wise_SentenceService()
    {
        $this->services['sonata.admin.wise.sentence'] = $instance = new \Gdr\AdministrationBundle\Admin\WiseSentenceAdmin(NULL, 'Gdr\\GameBundle\\Entity\\Wise\\WiseSentence', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('WiseSentenceAdmin');
        return $instance;
    }
    protected function getSonata_Admin_Wise_TagService()
    {
        $this->services['sonata.admin.wise.tag'] = $instance = new \Gdr\AdministrationBundle\Admin\WiseTagAdmin(NULL, 'Gdr\\GameBundle\\Entity\\Wise\\WiseTag', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('WiseTagAdmin');
        return $instance;
    }
    protected function getSonata_Admin_WorkService()
    {
        $this->services['sonata.admin.work'] = $instance = new \Gdr\AdministrationBundle\Admin\WorkAdmin(NULL, 'Gdr\\GameBundle\\Entity\\Work', 'SonataAdminBundle:CRUD');
        $instance->setTranslationDomain('WorkAdmin');
        return $instance;
    }
    protected function getStofDoctrineExtensions_Uploadable_ManagerService()
    {
        $a = new \Gedmo\Uploadable\UploadableListener(new \Stof\DoctrineExtensionsBundle\Uploadable\MimeTypeGuesserAdapter());
        $a->setAnnotationReader($this->get('annotation_reader'));
        $a->setDefaultFileInfoClass('Stof\\DoctrineExtensionsBundle\\Uploadable\\UploadedFileInfo');
        return $this->services['stof_doctrine_extensions.uploadable.manager'] = new \Stof\DoctrineExtensionsBundle\Uploadable\UploadableManager($a, 'Stof\\DoctrineExtensionsBundle\\Uploadable\\UploadedFileInfo');
    }
    protected function getStreamedResponseListenerService()
    {
        return $this->services['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener();
    }
    protected function getSwiftmailer_EmailSender_ListenerService()
    {
        return $this->services['swiftmailer.email_sender.listener'] = new \Symfony\Bundle\SwiftmailerBundle\EventListener\EmailSenderListener($this, $this->get('logger', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getSwiftmailer_Mailer_DefaultService()
    {
        return $this->services['swiftmailer.mailer.default'] = new \Swift_Mailer($this->get('swiftmailer.mailer.default.transport'));
    }
    protected function getSwiftmailer_Mailer_Default_SpoolService()
    {
        return $this->services['swiftmailer.mailer.default.spool'] = new \Swift_MemorySpool();
    }
    protected function getSwiftmailer_Mailer_Default_TransportService()
    {
        return $this->services['swiftmailer.mailer.default.transport'] = new \Swift_Transport_SpoolTransport($this->get('swiftmailer.mailer.default.transport.eventdispatcher'), $this->get('swiftmailer.mailer.default.spool'));
    }
    protected function getSwiftmailer_Mailer_Default_Transport_RealService()
    {
        $a = new \Swift_Transport_Esmtp_AuthHandler(array(0 => new \Swift_Transport_Esmtp_Auth_CramMd5Authenticator(), 1 => new \Swift_Transport_Esmtp_Auth_LoginAuthenticator(), 2 => new \Swift_Transport_Esmtp_Auth_PlainAuthenticator()));
        $a->setUsername('gestione@shenteon.com');
        $a->setPassword('jL3yUdo5nXeVILa');
        $a->setAuthMode(NULL);
        $this->services['swiftmailer.mailer.default.transport.real'] = $instance = new \Swift_Transport_EsmtpTransport(new \Swift_Transport_StreamBuffer(new \Swift_StreamFilters_StringReplacementFilterFactory()), array(0 => $a), $this->get('swiftmailer.mailer.default.transport.eventdispatcher'));
        $instance->setHost('localhost');
        $instance->setPort(25);
        $instance->setEncryption(NULL);
        $instance->setTimeout(30);
        $instance->setSourceIp(NULL);
        return $instance;
    }
    protected function getTemplatingService()
    {
        return $this->services['templating'] = new \Symfony\Bundle\TwigBundle\TwigEngine($this->get('twig'), $this->get('templating.name_parser'), $this->get('templating.locator'));
    }
    protected function getTemplating_FilenameParserService()
    {
        return $this->services['templating.filename_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateFilenameParser();
    }
    protected function getTemplating_Helper_AssetsService()
    {
        return $this->services['templating.helper.assets'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\AssetsHelper($this->get('assets.packages'), array());
    }
    protected function getTemplating_Helper_LogoutUrlService()
    {
        return $this->services['templating.helper.logout_url'] = new \Symfony\Bundle\SecurityBundle\Templating\Helper\LogoutUrlHelper($this->get('security.logout_url_generator'));
    }
    protected function getTemplating_Helper_RouterService()
    {
        return $this->services['templating.helper.router'] = new \Symfony\Bundle\FrameworkBundle\Templating\Helper\RouterHelper($this->get('router'));
    }
    protected function getTemplating_Helper_SecurityService()
    {
        return $this->services['templating.helper.security'] = new \Symfony\Bundle\SecurityBundle\Templating\Helper\SecurityHelper($this->get('security.authorization_checker', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getTemplating_LoaderService()
    {
        return $this->services['templating.loader'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\FilesystemLoader($this->get('templating.locator'));
    }
    protected function getTemplating_NameParserService()
    {
        return $this->services['templating.name_parser'] = new \Symfony\Bundle\FrameworkBundle\Templating\TemplateNameParser($this->get('kernel'));
    }
    protected function getTranslation_Dumper_CsvService()
    {
        return $this->services['translation.dumper.csv'] = new \Symfony\Component\Translation\Dumper\CsvFileDumper();
    }
    protected function getTranslation_Dumper_IniService()
    {
        return $this->services['translation.dumper.ini'] = new \Symfony\Component\Translation\Dumper\IniFileDumper();
    }
    protected function getTranslation_Dumper_JsonService()
    {
        return $this->services['translation.dumper.json'] = new \Symfony\Component\Translation\Dumper\JsonFileDumper();
    }
    protected function getTranslation_Dumper_MoService()
    {
        return $this->services['translation.dumper.mo'] = new \Symfony\Component\Translation\Dumper\MoFileDumper();
    }
    protected function getTranslation_Dumper_PhpService()
    {
        return $this->services['translation.dumper.php'] = new \Symfony\Component\Translation\Dumper\PhpFileDumper();
    }
    protected function getTranslation_Dumper_PoService()
    {
        return $this->services['translation.dumper.po'] = new \Symfony\Component\Translation\Dumper\PoFileDumper();
    }
    protected function getTranslation_Dumper_QtService()
    {
        return $this->services['translation.dumper.qt'] = new \Symfony\Component\Translation\Dumper\QtFileDumper();
    }
    protected function getTranslation_Dumper_ResService()
    {
        return $this->services['translation.dumper.res'] = new \Symfony\Component\Translation\Dumper\IcuResFileDumper();
    }
    protected function getTranslation_Dumper_XliffService()
    {
        return $this->services['translation.dumper.xliff'] = new \Symfony\Component\Translation\Dumper\XliffFileDumper();
    }
    protected function getTranslation_Dumper_YmlService()
    {
        return $this->services['translation.dumper.yml'] = new \Symfony\Component\Translation\Dumper\YamlFileDumper();
    }
    protected function getTranslation_ExtractorService()
    {
        $this->services['translation.extractor'] = $instance = new \Symfony\Component\Translation\Extractor\ChainExtractor();
        $instance->addExtractor('php', $this->get('translation.extractor.php'));
        $instance->addExtractor('twig', $this->get('twig.translation.extractor'));
        return $instance;
    }
    protected function getTranslation_Extractor_PhpService()
    {
        return $this->services['translation.extractor.php'] = new \Symfony\Bundle\FrameworkBundle\Translation\PhpExtractor();
    }
    protected function getTranslation_LoaderService()
    {
        $a = $this->get('translation.loader.xliff');
        $this->services['translation.loader'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\TranslationLoader();
        $instance->addLoader('php', $this->get('translation.loader.php'));
        $instance->addLoader('yml', $this->get('translation.loader.yml'));
        $instance->addLoader('xlf', $a);
        $instance->addLoader('xliff', $a);
        $instance->addLoader('po', $this->get('translation.loader.po'));
        $instance->addLoader('mo', $this->get('translation.loader.mo'));
        $instance->addLoader('ts', $this->get('translation.loader.qt'));
        $instance->addLoader('csv', $this->get('translation.loader.csv'));
        $instance->addLoader('res', $this->get('translation.loader.res'));
        $instance->addLoader('dat', $this->get('translation.loader.dat'));
        $instance->addLoader('ini', $this->get('translation.loader.ini'));
        $instance->addLoader('json', $this->get('translation.loader.json'));
        return $instance;
    }
    protected function getTranslation_Loader_CsvService()
    {
        return $this->services['translation.loader.csv'] = new \Symfony\Component\Translation\Loader\CsvFileLoader();
    }
    protected function getTranslation_Loader_DatService()
    {
        return $this->services['translation.loader.dat'] = new \Symfony\Component\Translation\Loader\IcuDatFileLoader();
    }
    protected function getTranslation_Loader_IniService()
    {
        return $this->services['translation.loader.ini'] = new \Symfony\Component\Translation\Loader\IniFileLoader();
    }
    protected function getTranslation_Loader_JsonService()
    {
        return $this->services['translation.loader.json'] = new \Symfony\Component\Translation\Loader\JsonFileLoader();
    }
    protected function getTranslation_Loader_MoService()
    {
        return $this->services['translation.loader.mo'] = new \Symfony\Component\Translation\Loader\MoFileLoader();
    }
    protected function getTranslation_Loader_PhpService()
    {
        return $this->services['translation.loader.php'] = new \Symfony\Component\Translation\Loader\PhpFileLoader();
    }
    protected function getTranslation_Loader_PoService()
    {
        return $this->services['translation.loader.po'] = new \Symfony\Component\Translation\Loader\PoFileLoader();
    }
    protected function getTranslation_Loader_QtService()
    {
        return $this->services['translation.loader.qt'] = new \Symfony\Component\Translation\Loader\QtFileLoader();
    }
    protected function getTranslation_Loader_ResService()
    {
        return $this->services['translation.loader.res'] = new \Symfony\Component\Translation\Loader\IcuResFileLoader();
    }
    protected function getTranslation_Loader_XliffService()
    {
        return $this->services['translation.loader.xliff'] = new \Symfony\Component\Translation\Loader\XliffFileLoader();
    }
    protected function getTranslation_Loader_YmlService()
    {
        return $this->services['translation.loader.yml'] = new \Symfony\Component\Translation\Loader\YamlFileLoader();
    }
    protected function getTranslation_WriterService()
    {
        $this->services['translation.writer'] = $instance = new \Symfony\Component\Translation\Writer\TranslationWriter();
        $instance->addDumper('php', $this->get('translation.dumper.php'));
        $instance->addDumper('xlf', $this->get('translation.dumper.xliff'));
        $instance->addDumper('po', $this->get('translation.dumper.po'));
        $instance->addDumper('mo', $this->get('translation.dumper.mo'));
        $instance->addDumper('yml', $this->get('translation.dumper.yml'));
        $instance->addDumper('ts', $this->get('translation.dumper.qt'));
        $instance->addDumper('csv', $this->get('translation.dumper.csv'));
        $instance->addDumper('ini', $this->get('translation.dumper.ini'));
        $instance->addDumper('json', $this->get('translation.dumper.json'));
        $instance->addDumper('res', $this->get('translation.dumper.res'));
        return $instance;
    }
    protected function getTranslator_DefaultService()
    {
        $this->services['translator.default'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\Translator($this, new \Symfony\Component\Translation\MessageSelector(), array('translation.loader.php' => array(0 => 'php'), 'translation.loader.yml' => array(0 => 'yml'), 'translation.loader.xliff' => array(0 => 'xlf', 1 => 'xliff'), 'translation.loader.po' => array(0 => 'po'), 'translation.loader.mo' => array(0 => 'mo'), 'translation.loader.qt' => array(0 => 'ts'), 'translation.loader.csv' => array(0 => 'csv'), 'translation.loader.res' => array(0 => 'res'), 'translation.loader.dat' => array(0 => 'dat'), 'translation.loader.ini' => array(0 => 'ini'), 'translation.loader.json' => array(0 => 'json')), array('cache_dir' => (__DIR__.'/translations'), 'debug' => false, 'resource_files' => array('tr' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.tr.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.tr.xlf')), 'ru' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ru.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ru.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ru.xlf')), 'sr_Latn' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sr_Latn.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sr_Latn.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sr_Latn.xlf')), 'cs' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.cs.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.cs.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.cs.xlf')), 'pt_BR' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pt_BR.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pt_BR.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.pt_BR.xlf')), 'de' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.de.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.de.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.de.xlf')), 'en' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.en.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.en.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.en.xlf'), 3 => ($this->targetDirs[3].'/vendor/vich/uploader-bundle/Resources/translations/VichUploaderBundle.en.yml')), 'fr' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fr.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fr.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.fr.xlf'), 3 => ($this->targetDirs[3].'/vendor/vich/uploader-bundle/Resources/translations/VichUploaderBundle.fr.yml'), 4 => ($this->targetDirs[3].'/src/Gdr/SiteBundle/Resources/translations/messages.fr.xlf'), 5 => ($this->targetDirs[3].'/src/Gdr/UserBundle/Resources/translations/messages.fr.xlf'), 6 => ($this->targetDirs[3].'/src/Gdr/GameBundle/Resources/translations/messages.fr.xlf'), 7 => ($this->targetDirs[3].'/src/Gdr/ItemsBundle/Resources/translations/messages.fr.xlf')), 'lt' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lt.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lt.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.lt.xlf')), 'nl' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.nl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.nl.xlf')), 'hy' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hy.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hy.xlf')), 'uk' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.uk.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.uk.xlf')), 'mn' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.mn.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.mn.xlf')), 'it' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.it.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.it.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.it.xlf'), 3 => ($this->targetDirs[3].'/src/Gdr/UserBundle/Resources/translations/messages.it.yml'), 4 => ($this->targetDirs[3].'/src/Gdr/GameBundle/Resources/translations/admin.it.yml'), 5 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/WisetagAdmin.it.yml'), 6 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/LocationAdmin.it.yml'), 7 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/EnclaveRankAdmin.it.yml'), 8 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/TagChat.it.yml'), 9 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/LetterBackgroundAdmin.it.yml'), 10 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/EdittoAdmin.it.yml'), 11 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/EnclaveAdmin.it.yml'), 12 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/PropertyAdmin.it.yml'), 13 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/RaceAdmin.it.yml'), 14 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/GdrAdministrationBundle.it.yml'), 15 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/EsilioAdmin.it.yml'), 16 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/titleAdmin.it.yml'), 17 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/ForumCategoryAdmin.it.yml'), 18 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/LibrarySectionAdmin.it.yml'), 19 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/LocationImageAdmin.it.yml'), 20 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/CombatSetAdmin.it.yml'), 21 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/NewsAdmin.it.yml'), 22 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/MoonStatusAdmin.it.yml'), 23 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/MoonAdmin.it.yml'), 24 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/PersonageTypeAdmin.it.yml'), 25 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/PropertyItemAdmin.it.yml'), 26 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/WiseSentenceAdmin.it.yml'), 27 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/ItemAdmin.it.yml'), 28 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/ForbiddenNameAdmin.it.yml'), 29 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/LibraryBookAdmin.it.yml'), 30 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/SkillAdmin.it.yml'), 31 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/ManualeAdmin.it.yml'), 32 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/MeteoWindAdmin.it.yml'), 33 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/UploadAdmin.it.yml'), 34 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/LanguageAdmin.it.yml'), 35 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/LetterAdmin.it.yml'), 36 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/ForumAdmin.it.yml'), 37 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/itemTypeAdmin.it.yml'), 38 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/AchievementAdmin.it.yml'), 39 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/eyeColor.it.yml'), 40 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/WorkAdmin.it.yml'), 41 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/GravestoneAdmin.it.yml'), 42 => ($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/translations/PersonageAdmin.it.yml'), 43 => ($this->targetDirs[3].'/src/Gdr/MeteoBundle/Resources/translations/MeteoMessageAdmin.it.yml'), 44 => ($this->targetDirs[3].'/src/Gdr/MeteoBundle/Resources/translations/MeteoConditionAdmin.it.yml'), 45 => ($this->targetDirs[3].'/src/Gdr/MeteoBundle/Resources/translations/MeteoMonthAdmin.it.yml'), 46 => ($this->targetDirs[3].'/src/Gdr/MeteoBundle/Resources/translations/MeteoStatusAdmin.it.yml'), 47 => ($this->targetDirs[3].'/src/Gdr/MeteoBundle/Resources/translations/MeteoSeasonAdmin.it.yml'), 48 => ($this->targetDirs[3].'/src/Gdr/MeteoBundle/Resources/translations/MeteoCombinationAdmin.it.yml'), 49 => ($this->targetDirs[3].'/src/Gdr/MeteoBundle/Resources/translations/MeteoWindAdmin.it.yml'), 50 => ($this->targetDirs[2].'/Resources/translations/messages.it.yml')), 'gl' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.gl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.gl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.gl.xlf')), 'eu' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.eu.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.eu.xlf')), 'hu' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hu.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hu.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.hu.xlf')), 'sl' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sl.xlf')), 'th' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.th.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.th.xlf')), 'lb' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.lb.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lb.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.lb.xlf')), 'fi' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fi.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fi.xlf')), 'zh_CN' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.zh_CN.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.zh_CN.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.zh_CN.xlf')), 'he' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.he.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.he.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.he.xlf')), 'ja' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ja.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ja.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ja.xlf')), 'bg' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.bg.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.bg.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.bg.xlf')), 'sr_Cyrl' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sr_Cyrl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sr_Cyrl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sr_Cyrl.xlf')), 'cy' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.cy.xlf')), 'da' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.da.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.da.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.da.xlf')), 'ro' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ro.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ro.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ro.xlf')), 'pt' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pt.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pt.xlf')), 'hr' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.hr.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.hr.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.hr.xlf')), 'ca' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ca.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ca.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ca.xlf')), 'et' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.et.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.et.xlf')), 'fa' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.fa.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.fa.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.fa.xlf')), 'sv' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sv.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sv.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sv.xlf')), 'az' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.az.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.az.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.az.xlf')), 'ar' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.ar.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.ar.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ar.xlf')), 'pl' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.pl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.pl.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.pl.xlf')), 'es' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.es.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.es.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.es.xlf')), 'sq' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sq.xlf')), 'zh_TW' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.zh_TW.xlf')), 'id' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.id.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.id.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.id.xlf')), 'vi' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.vi.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.vi.xlf')), 'el' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.el.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.el.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.el.xlf')), 'nb' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.nb.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.nb.xlf')), 'af' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.af.xlf')), 'no' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.no.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.no.xlf')), 'sk' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Validator/Resources/translations/validators.sk.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.sk.xlf'), 2 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.sk.xlf')), 'lv' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/translations/validators.lv.xlf')), 'ua' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.ua.xlf')), 'pt_PT' => array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Security/Core/Exception/../Resources/translations/security.pt_PT.xlf')))), array());
        $instance->setConfigCacheFactory($this->get('config_cache_factory'));
        $instance->setFallbackLocales(array(0 => 'it'));
        return $instance;
    }
    protected function getTranslatorListenerService()
    {
        return $this->services['translator_listener'] = new \Symfony\Component\HttpKernel\EventListener\TranslatorListener($this->get('translator.default'), $this->get('request_stack'));
    }
    protected function getTwigService()
    {
        $a = $this->get('security.authorization_checker');
        $b = $this->get('request_stack');
        $c = $this->get('fragment.handler');
        $d = new \Symfony\Bridge\Twig\Extension\HttpFoundationExtension($b);
        $e = new \Symfony\Bridge\Twig\AppVariable();
        $e->setEnvironment('prod');
        $e->setDebug(false);
        if ($this->has('security.token_storage')) {
            $e->setTokenStorage($this->get('security.token_storage', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        }
        if ($this->has('request_stack')) {
            $e->setRequestStack($b);
        }
        $e->setContainer($this);
        $this->services['twig'] = $instance = new \Twig_Environment($this->get('twig.loader'), array('debug' => false, 'strict_variables' => false, 'exception_controller' => 'twig.controller.exception:showAction', 'form_themes' => array(0 => 'form_div_layout.html.twig'), 'autoescape' => 'filename', 'cache' => (__DIR__.'/twig'), 'charset' => 'UTF-8', 'paths' => array(), 'date' => array('format' => 'F j, Y H:i', 'interval_format' => '%d days', 'timezone' => NULL), 'number_format' => array('decimals' => 0, 'decimal_point' => '.', 'thousands_separator' => ',')));
        $instance->addExtension($this->get('twig.extension.intl'));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\LogoutUrlExtension($this->get('security.logout_url_generator')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\SecurityExtension($a));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension($this->get('translator.default')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\AssetExtension($this->get('assets.packages'), $d));
        $instance->addExtension(new \Symfony\Bundle\TwigBundle\Extension\ActionsExtension($c));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\CodeExtension(NULL, $this->targetDirs[2], 'UTF-8'));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension($this->get('router')));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\StopwatchExtension($this->get('debug.stopwatch', ContainerInterface::NULL_ON_INVALID_REFERENCE), false));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ExpressionExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpKernelExtension($c));
        $instance->addExtension($d);
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\FormExtension(new \Symfony\Bridge\Twig\Form\TwigRenderer(new \Symfony\Bridge\Twig\Form\TwigRendererEngine(array(0 => 'form_div_layout.html.twig', 1 => 'IvoryCKEditorBundle:Form:ckeditor_widget.html.twig')), $this->get('security.csrf.token_manager', ContainerInterface::NULL_ON_INVALID_REFERENCE))));
        $instance->addExtension(new \Symfony\Bundle\AsseticBundle\Twig\AsseticExtension($this->get('assetic.asset_factory'), $this->get('templating.name_parser'), false, array(), array(0 => 'GdrSiteBundle', 1 => 'GdrGameBundle', 2 => 'GdrAvatarBundle', 3 => 'GdrAdministrationBundle', 4 => 'GdrUserBundle'), new \Symfony\Bundle\AsseticBundle\DefaultValueSupplier($this)));
        $instance->addExtension(new \Doctrine\Bundle\DoctrineBundle\Twig\DoctrineExtension());
        $instance->addExtension(new \JMS\SecurityExtraBundle\Twig\SecurityExtension($a));
        $instance->addExtension($this->get('ivory_ck_editor.twig_extension'));
        $instance->addExtension(new \Vich\UploaderBundle\Twig\Extension\UploaderExtension($this->get('vich_uploader.templating.helper.uploader_helper')));
        $instance->addExtension(new \JMS\Serializer\Twig\SerializerExtension($this->get('jms_serializer')));
        $instance->addExtension($this->get('exercise_html_purifier.twig_extension'));
        $instance->addExtension($this->get('knp_paginator.twig.extension.pagination'));
        $instance->addExtension($this->get('gdr.game_bundle.twig.teon_date_extension'));
        $instance->addExtension($this->get('gdr.game_bundle.twig.race_chat_extension'));
        $instance->addExtension($this->get('gdr.game_bundle.twig.chat_extension'));
        $instance->addExtension($this->get('gdr.game_bundle.twig.combat_extension'));
        $instance->addExtension($this->get('gdr.game_bundle.twig.path_extension'));
        $instance->addExtension($this->get('gdr.game_bundle.twig.text_extension'));
        $instance->addGlobal('app', $e);
        call_user_func(array(new \Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator('F j, Y H:i', '%d days', NULL, 0, '.', ','), 'configure'), $instance);
        return $instance;
    }
    protected function getTwig_Controller_ExceptionService()
    {
        return $this->services['twig.controller.exception'] = new \Symfony\Bundle\TwigBundle\Controller\ExceptionController($this->get('twig'), false);
    }
    protected function getTwig_Controller_PreviewErrorService()
    {
        return $this->services['twig.controller.preview_error'] = new \Symfony\Bundle\TwigBundle\Controller\PreviewErrorController($this->get('http_kernel'), 'twig.controller.exception:showAction');
    }
    protected function getTwig_ExceptionListenerService()
    {
        return $this->services['twig.exception_listener'] = new \Symfony\Component\HttpKernel\EventListener\ExceptionListener('twig.controller.exception:showAction', $this->get('monolog.logger.request', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getTwig_Extension_IntlService()
    {
        return $this->services['twig.extension.intl'] = new \Twig_Extensions_Extension_Intl();
    }
    protected function getTwig_LoaderService()
    {
        $this->services['twig.loader'] = $instance = new \Symfony\Bundle\TwigBundle\Loader\FilesystemLoader($this->get('templating.locator'), $this->get('templating.name_parser'));
        $instance->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/FrameworkBundle/Resources/views'), 'Framework');
        $instance->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/SecurityBundle/Resources/views'), 'Security');
        $instance->addPath(($this->targetDirs[2].'/Resources/TwigBundle/views'), 'Twig');
        $instance->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bundle/TwigBundle/Resources/views'), 'Twig');
        $instance->addPath(($this->targetDirs[3].'/vendor/symfony/swiftmailer-bundle/Resources/views'), 'Swiftmailer');
        $instance->addPath(($this->targetDirs[3].'/vendor/doctrine/doctrine-bundle/Resources/views'), 'Doctrine');
        $instance->addPath(($this->targetDirs[3].'/vendor/egeloen/ckeditor-bundle/Ivory/CKEditorBundle/Resources/views'), 'IvoryCKEditor');
        $instance->addPath(($this->targetDirs[3].'/vendor/vich/uploader-bundle/Resources/views'), 'VichUploader');
        $instance->addPath(($this->targetDirs[3].'/vendor/knplabs/knp-paginator-bundle/Resources/views'), 'KnpPaginator');
        $instance->addPath(($this->targetDirs[3].'/src/Gdr/SiteBundle/Resources/views'), 'GdrSite');
        $instance->addPath(($this->targetDirs[3].'/src/Gdr/UserBundle/Resources/views'), 'GdrUser');
        $instance->addPath(($this->targetDirs[3].'/src/Gdr/GameBundle/Resources/views'), 'GdrGame');
        $instance->addPath(($this->targetDirs[3].'/src/Gdr/RaceBundle/Resources/views'), 'GdrRace');
        $instance->addPath(($this->targetDirs[3].'/src/Gdr/AvatarBundle/Resources/views'), 'GdrAvatar');
        $instance->addPath(($this->targetDirs[3].'/src/Gdr/ItemsBundle/Resources/views'), 'GdrItems');
        $instance->addPath(($this->targetDirs[3].'/src/Gdr/AdministrationBundle/Resources/views'), 'GdrAdministration');
        $instance->addPath(($this->targetDirs[3].'/src/Gdr/MeteoBundle/Resources/views'), 'GdrMeteo');
        $instance->addPath(($this->targetDirs[2].'/Resources/views'));
        $instance->addPath(($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Bridge/Twig/Resources/views/Form'));
        return $instance;
    }
    protected function getTwig_ProfileService()
    {
        return $this->services['twig.profile'] = new \Twig_Profiler_Profile();
    }
    protected function getTwig_Translation_ExtractorService()
    {
        return $this->services['twig.translation.extractor'] = new \Symfony\Bridge\Twig\Translation\TwigExtractor($this->get('twig'));
    }
    protected function getUriSignerService()
    {
        return $this->services['uri_signer'] = new \Symfony\Component\HttpKernel\UriSigner('8eb83fe916d7bdf9e563336ecb84d4e8');
    }
    protected function getUser_Encoder_PasswordService()
    {
        return $this->services['user.encoder.password'] = new \Gdr\UserBundle\Listener\EncoderPassword($this->get('security.encoder_factory'));
    }
    protected function getUser_Listener_ActivityService()
    {
        return $this->services['user.listener.activity'] = new \Gdr\UserBundle\Listener\Activity($this->get('security.context'), $this->get('doctrine'), $this->get('router'), new \Gdr\UserBundle\Listener\RequestInjector($this));
    }
    protected function getValidatorService()
    {
        return $this->services['validator'] = $this->get('validator.builder')->getValidator();
    }
    protected function getValidator_BuilderService()
    {
        $this->services['validator.builder'] = $instance = \Symfony\Component\Validator\Validation::createValidatorBuilder();
        $instance->setConstraintValidatorFactory(new \Symfony\Bundle\FrameworkBundle\Validator\ConstraintValidatorFactory($this, array('validator.expression' => 'validator.expression', 'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => 'validator.email', 'security.validator.user_password' => 'security.validator.user_password', 'doctrine.orm.validator.unique' => 'doctrine.orm.validator.unique', 'CharsUsername' => 'gdr.user_bundle.validator.constraint.chars_username_validator', 'UsableUsername' => 'gdr.user_bundle.validator.constraint.usable_username_validator', 'NotBanned' => 'gdr.game_bundle.validator.constraint.not_banned_validator', 'ClanFree' => 'gdr.game_bundle.validator.constraint.clan_free_validator', 'DeathFree' => 'gdr.game_bundle.validator.constraint.death_free_validator', 'LifeFree' => 'gdr.game_bundle.validator.constraint.life_free_validator', 'NoMarried' => 'gdr.game_bundle.validator.constraint.no_married_validator', 'EnoughMoney' => 'gdr.game_bundle.validator.constraint.enough_money_validator', 'UsernameExist' => 'gdr.game_bundle.validator.constraint.valid_username_validator', 'EnclaveFree' => 'gdr.game_bundle.validator.constraint.enclave_free_validator')));
        $instance->setTranslator($this->get('translator.default'));
        $instance->setTranslationDomain('validators');
        $instance->addXmlMappings(array(0 => ($this->targetDirs[3].'/vendor/symfony/symfony/src/Symfony/Component/Form/Resources/config/validation.xml')));
        $instance->enableAnnotationMapping($this->get('annotation_reader'));
        $instance->addMethodMapping('loadValidatorMetadata');
        $instance->setMetadataCache(new \Symfony\Component\Validator\Mapping\Cache\ApcCache('validator_1afc8d46b02187468798c82da8894846684aa065107ad74e8b0b3e649194c896'));
        $instance->addObjectInitializers(array(0 => $this->get('doctrine.orm.validator_initializer')));
        return $instance;
    }
    protected function getValidator_EmailService()
    {
        return $this->services['validator.email'] = new \Symfony\Component\Validator\Constraints\EmailValidator(false);
    }
    protected function getValidator_ExpressionService()
    {
        return $this->services['validator.expression'] = new \Symfony\Component\Validator\Constraints\ExpressionValidator($this->get('property_accessor'));
    }
    protected function getVichUploader_FileInjectorService()
    {
        return $this->services['vich_uploader.file_injector'] = new \Vich\UploaderBundle\Injector\FileInjector($this->get('vich_uploader.storage.file_system'));
    }
    protected function getVichUploader_Form_Type_FileService()
    {
        return $this->services['vich_uploader.form.type.file'] = new \Vich\UploaderBundle\Form\Type\VichFileType($this->get('vich_uploader.storage.file_system'), $this->get('vich_uploader.upload_handler'), $this->get('translator.default'));
    }
    protected function getVichUploader_Form_Type_ImageService()
    {
        return $this->services['vich_uploader.form.type.image'] = new \Vich\UploaderBundle\Form\Type\VichImageType($this->get('vich_uploader.storage.file_system'), $this->get('vich_uploader.upload_handler'), $this->get('translator.default'));
    }
    protected function getVichUploader_NamerOrignameService()
    {
        return $this->services['vich_uploader.namer_origname'] = new \Vich\UploaderBundle\Naming\OrignameNamer();
    }
    protected function getVichUploader_NamerUniqidService()
    {
        return $this->services['vich_uploader.namer_uniqid'] = new \Vich\UploaderBundle\Naming\UniqidNamer();
    }
    protected function getVichUploader_Storage_FileSystemService()
    {
        return $this->services['vich_uploader.storage.file_system'] = new \Vich\UploaderBundle\Storage\FileSystemStorage($this->get('vich_uploader.property_mapping_factory'));
    }
    protected function getVichUploader_StorageFactoryService()
    {
        return $this->services['vich_uploader.storage_factory'] = new \Vich\UploaderBundle\Storage\StorageFactory($this);
    }
    protected function getVichUploader_Templating_Helper_UploaderHelperService()
    {
        return $this->services['vich_uploader.templating.helper.uploader_helper'] = new \Vich\UploaderBundle\Templating\Helper\UploaderHelper($this->get('vich_uploader.storage.file_system'));
    }
    protected function getVichUploader_UploadHandlerService()
    {
        return $this->services['vich_uploader.upload_handler'] = new \Vich\UploaderBundle\Handler\UploadHandler($this->get('vich_uploader.property_mapping_factory'), $this->get('vich_uploader.storage.file_system'), $this->get('vich_uploader.file_injector'), $this->get('event_dispatcher'));
    }
    protected function getAssetic_AssetFactoryService()
    {
        return $this->services['assetic.asset_factory'] = new \Symfony\Bundle\AsseticBundle\Factory\AssetFactory($this->get('kernel'), $this, $this->getParameterBag(), ($this->targetDirs[2].'/../web'), false);
    }
    protected function getControllerNameConverterService()
    {
        return $this->services['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser($this->get('kernel'));
    }
    protected function getJmsDiExtra_ControllerResolverService()
    {
        return $this->services['jms_di_extra.controller_resolver'] = new \JMS\DiExtraBundle\HttpKernel\ControllerResolver($this, $this->get('controller_name_converter'), $this->get('monolog.logger.request', ContainerInterface::NULL_ON_INVALID_REFERENCE));
    }
    protected function getJmsSerializer_UnserializeObjectConstructorService()
    {
        return $this->services['jms_serializer.unserialize_object_constructor'] = new \JMS\Serializer\Construction\UnserializeObjectConstructor();
    }
    protected function getMonolog_Handler_Swift_MailMessageFactoryService($lazyLoad = true)
    {
        return $this->services['monolog.handler.swift.mail_message_factory'] = new \Symfony\Bundle\MonologBundle\SwiftMailer\MessageFactory($this->get('swiftmailer.mailer.default'), 'notifiche@shenteon.com', array(0 => 'diego.viola1@gmail.com'), 'OOps: errore dal sito', NULL);
    }
    protected function getRouter_RequestContextService()
    {
        return $this->services['router.request_context'] = new \Symfony\Component\Routing\RequestContext('', 'GET', 'localhost', 'http', 80, 443);
    }
    protected function getSecurity_Authentication_ManagerService()
    {
        $this->services['security.authentication.manager'] = $instance = new \Symfony\Component\Security\Core\Authentication\AuthenticationProviderManager(array(0 => new \Symfony\Component\Security\Core\Authentication\Provider\DaoAuthenticationProvider($this->get('security.user.provider.concrete.database'), $this->get('security.user_checker.secured_area'), 'secured_area', $this->get('security.encoder_factory'), true), 1 => new \Symfony\Component\Security\Core\Authentication\Provider\AnonymousAuthenticationProvider('593ab854863026.41407377')), true);
        $instance->setEventDispatcher($this->get('event_dispatcher'));
        return $instance;
    }
    protected function getSecurity_Expressions_HandlerService()
    {
        return $this->services['security.expressions.handler'] = new \JMS\SecurityExtraBundle\Security\Authorization\Expression\ContainerAwareExpressionHandler($this);
    }
    protected function getSecurity_Extra_MetadataFactoryService()
    {
        $this->services['security.extra.metadata_factory'] = $instance = new \Metadata\MetadataFactory(new \Metadata\Driver\LazyLoadingDriver($this, 'security.extra.metadata_driver'));
        $instance->setCache(new \Metadata\Cache\FileCache((__DIR__.'/jms_security'), false));
        $instance->setIncludeInterfaces(true);
        return $instance;
    }
    protected function getSecurity_LogoutUrlGeneratorService()
    {
        $this->services['security.logout_url_generator'] = $instance = new \Symfony\Component\Security\Http\Logout\LogoutUrlGenerator($this->get('request_stack', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('router', ContainerInterface::NULL_ON_INVALID_REFERENCE), $this->get('security.token_storage', ContainerInterface::NULL_ON_INVALID_REFERENCE));
        $instance->registerListener('secured_area', '/logout', 'logout', '_csrf_token', NULL);
        return $instance;
    }
    protected function getSecurity_User_Provider_Concrete_DatabaseService()
    {
        return $this->services['security.user.provider.concrete.database'] = new \Symfony\Bridge\Doctrine\Security\User\EntityUserProvider($this->get('doctrine'), 'GdrUserBundle:User', 'email', NULL);
    }
    protected function getSession_Storage_MetadataBagService()
    {
        return $this->services['session.storage.metadata_bag'] = new \Symfony\Component\HttpFoundation\Session\Storage\MetadataBag('_sf2_meta', '0');
    }
    protected function getSwiftmailer_Mailer_Default_Transport_EventdispatcherService()
    {
        return $this->services['swiftmailer.mailer.default.transport.eventdispatcher'] = new \Swift_Events_SimpleEventDispatcher();
    }
    protected function getTemplating_LocatorService()
    {
        return $this->services['templating.locator'] = new \Symfony\Bundle\FrameworkBundle\Templating\Loader\TemplateLocator($this->get('file_locator'), __DIR__);
    }
    protected function getVichUploader_MetadataReaderService()
    {
        $a = new \Vich\UploaderBundle\Metadata\Driver\FileLocator(array());
        $b = new \Metadata\MetadataFactory(new \Vich\UploaderBundle\Metadata\Driver\ChainDriver(array(0 => new \Vich\UploaderBundle\Metadata\Driver\AnnotationDriver($this->get('annotation_reader')), 1 => new \Vich\UploaderBundle\Metadata\Driver\YamlDriver($a), 2 => new \Vich\UploaderBundle\Metadata\Driver\XmlDriver($a))));
        $b->setCache(new \Metadata\Cache\FileCache((__DIR__.'/vich_uploader')));
        return $this->services['vich_uploader.metadata_reader'] = new \Vich\UploaderBundle\Metadata\MetadataReader($b);
    }
    protected function getVichUploader_PropertyMappingFactoryService()
    {
        return $this->services['vich_uploader.property_mapping_factory'] = new \Vich\UploaderBundle\Mapping\PropertyMappingFactory($this, $this->get('vich_uploader.metadata_reader'), array('item_image' => array('uri_prefix' => '/uploads/items', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/items'), 'namer' => 'vich_uploader.namer_uniqid', 'inject_on_load' => true, 'delete_on_update' => true, 'delete_on_remove' => true, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'item_type' => array('uri_prefix' => '/uploads/itemsType', 'upload_destination' => ($this->targetDirs[2].'/../web/uploads/itemsType'), 'namer' => 'vich_uploader.namer_uniqid', 'inject_on_load' => true, 'delete_on_update' => true, 'delete_on_remove' => true, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'item_big_image' => array('uri_prefix' => '/uploads/items', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/items'), 'namer' => 'vich_uploader.namer_uniqid', 'inject_on_load' => true, 'delete_on_update' => true, 'delete_on_remove' => true, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'item_icon_dress_image' => array('uri_prefix' => '/uploads/items', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/items'), 'namer' => 'vich_uploader.namer_uniqid', 'inject_on_load' => true, 'delete_on_update' => false, 'delete_on_remove' => false, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'race_icon_male' => array('uri_prefix' => '/uploads/race', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/race'), 'namer' => 'vich_uploader.namer_uniqid', 'inject_on_load' => true, 'delete_on_update' => false, 'directory_namer' => NULL, 'delete_on_remove' => true, 'db_driver' => 'orm'), 'race_icon_female' => array('uri_prefix' => '/uploads/race', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/race'), 'namer' => 'vich_uploader.namer_uniqid', 'inject_on_load' => true, 'delete_on_update' => false, 'delete_on_remove' => false, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'race_default_image' => array('uri_prefix' => '/uploads/race', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/race'), 'namer' => 'vich_uploader.namer_uniqid', 'inject_on_load' => true, 'delete_on_update' => false, 'delete_on_remove' => false, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'race_big_image' => array('uri_prefix' => '/uploads/race', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/race'), 'namer' => 'vich_uploader.namer_uniqid', 'inject_on_load' => true, 'delete_on_update' => true, 'delete_on_remove' => true, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'enclave_upload' => array('uri_prefix' => '/uploads/enclave', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/enclave'), 'namer' => 'vich_uploader.namer_uniqid', 'inject_on_load' => true, 'delete_on_update' => false, 'delete_on_remove' => false, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'avatar_image' => array('uri_prefix' => '/uploads/avatar', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/avatar'), 'namer' => 'vich_uploader.namer_uniqid', 'inject_on_load' => true, 'delete_on_update' => true, 'delete_on_remove' => true, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'skill_image' => array('uri_prefix' => '/uploads/skill', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/skill'), 'namer' => 'vich_uploader.namer_uniqid', 'inject_on_load' => true, 'delete_on_update' => true, 'delete_on_remove' => true, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'general_upload' => array('uri_prefix' => '/uploads/general', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/general'), 'namer' => 'vich_uploader.namer_uniqid', 'inject_on_load' => true, 'delete_on_update' => false, 'delete_on_remove' => false, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'meteo_image' => array('uri_prefix' => '/uploads/meteo', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/meteo'), 'namer' => 'vich_uploader.namer_origname', 'inject_on_load' => true, 'delete_on_update' => false, 'delete_on_remove' => false, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'book_image' => array('uri_prefix' => '/uploads/book', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/book'), 'namer' => 'vich_uploader.namer_origname', 'inject_on_load' => true, 'delete_on_update' => false, 'delete_on_remove' => false, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'moon_image' => array('uri_prefix' => '/uploads/book', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/book'), 'namer' => 'vich_uploader.namer_origname', 'inject_on_load' => true, 'delete_on_update' => false, 'delete_on_remove' => false, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'location_image' => array('uri_prefix' => '/uploads/location', 'upload_destination' => ($this->targetDirs[2].'/../web//uploads/location'), 'namer' => 'vich_uploader.namer_origname', 'inject_on_load' => true, 'delete_on_update' => false, 'delete_on_remove' => false, 'directory_namer' => NULL, 'db_driver' => 'orm'), 'achievement_image' => array('uri_prefix' => '/uploads/achievement', 'upload_destination' => ($this->targetDirs[2].'/../web/uploads/achievement'), 'namer' => 'vich_uploader.namer_origname', 'inject_on_load' => true, 'delete_on_update' => true, 'delete_on_remove' => true, 'directory_namer' => NULL, 'db_driver' => 'orm')), '_name');
    }
    public function getParameter($name)
    {
        $name = strtolower($name);
        if (!(isset($this->parameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        return $this->parameters[$name];
    }
    public function hasParameter($name)
    {
        $name = strtolower($name);
        return isset($this->parameters[$name]) || array_key_exists($name, $this->parameters);
    }
    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }
    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $this->parameterBag = new FrozenParameterBag($this->parameters);
        }
        return $this->parameterBag;
    }
    protected function getDefaultParameters()
    {
        return array(
            'kernel.root_dir' => $this->targetDirs[2],
            'kernel.environment' => 'prod',
            'kernel.debug' => false,
            'kernel.name' => 'app',
            'kernel.cache_dir' => __DIR__,
            'kernel.logs_dir' => ($this->targetDirs[2].'/logs'),
            'kernel.bundles' => array(
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'SecurityBundle' => 'Symfony\\Bundle\\SecurityBundle\\SecurityBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'MonologBundle' => 'Symfony\\Bundle\\MonologBundle\\MonologBundle',
                'SwiftmailerBundle' => 'Symfony\\Bundle\\SwiftmailerBundle\\SwiftmailerBundle',
                'AsseticBundle' => 'Symfony\\Bundle\\AsseticBundle\\AsseticBundle',
                'DoctrineBundle' => 'Doctrine\\Bundle\\DoctrineBundle\\DoctrineBundle',
                'SensioFrameworkExtraBundle' => 'Sensio\\Bundle\\FrameworkExtraBundle\\SensioFrameworkExtraBundle',
                'JMSAopBundle' => 'JMS\\AopBundle\\JMSAopBundle',
                'JMSDiExtraBundle' => 'JMS\\DiExtraBundle\\JMSDiExtraBundle',
                'JMSSecurityExtraBundle' => 'JMS\\SecurityExtraBundle\\JMSSecurityExtraBundle',
                'DoctrineFixturesBundle' => 'Doctrine\\Bundle\\FixturesBundle\\DoctrineFixturesBundle',
                'StofDoctrineExtensionsBundle' => 'Stof\\DoctrineExtensionsBundle\\StofDoctrineExtensionsBundle',
                'IvoryCKEditorBundle' => 'Ivory\\CKEditorBundle\\IvoryCKEditorBundle',
                'FOSJsRoutingBundle' => 'FOS\\JsRoutingBundle\\FOSJsRoutingBundle',
                'VichUploaderBundle' => 'Vich\\UploaderBundle\\VichUploaderBundle',
                'JMSSerializerBundle' => 'JMS\\SerializerBundle\\JMSSerializerBundle',
                'ExerciseHTMLPurifierBundle' => 'Exercise\\HTMLPurifierBundle\\ExerciseHTMLPurifierBundle',
                'ErivelloSimpleHtmlDomBundle' => 'Erivello\\SimpleHtmlDomBundle\\ErivelloSimpleHtmlDomBundle',
                'KnpPaginatorBundle' => 'Knp\\Bundle\\PaginatorBundle\\KnpPaginatorBundle',
                'GdrSiteBundle' => 'Gdr\\SiteBundle\\GdrSiteBundle',
                'GdrUserBundle' => 'Gdr\\UserBundle\\GdrUserBundle',
                'GdrGameBundle' => 'Gdr\\GameBundle\\GdrGameBundle',
                'GdrRaceBundle' => 'Gdr\\RaceBundle\\GdrRaceBundle',
                'GdrAvatarBundle' => 'Gdr\\AvatarBundle\\GdrAvatarBundle',
                'GdrItemsBundle' => 'Gdr\\ItemsBundle\\GdrItemsBundle',
                'GdrAdministrationBundle' => 'Gdr\\AdministrationBundle\\GdrAdministrationBundle',
                'GdrMeteoBundle' => 'Gdr\\MeteoBundle\\GdrMeteoBundle',
            ),
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'appProdProjectContainer',
            'database_driver' => 'pdo_mysql',
            'database_host' => '127.0.0.1',
            'database_port' => NULL,
            'database_name' => 'gdr',
            'database_user' => 'gdr',
            'database_password' => 'LyCKaF7J95D6CShu',
            'mailer_transport' => 'mail',
            'mailer_host' => 'localhost',
            'locale' => 'it',
            'secret' => '8eb83fe916d7bdf9e563336ecb84d4e8',
            'online_minutes' => 1440,
            'user_inactivity' => 1440,
            'race_upload_path' => '/uploads/race',
            'item_upload_path' => '/uploads/items',
            'skill_upload_path' => '/uploads/skill',
            'enclave_upload_path' => '/uploads/enclave',
            'general_upload_path' => '/uploads/general',
            'meteo_upload_path' => '/uploads/meteo',
            'book_upload_path' => '/uploads/book',
            'moon_image' => '/uploads/moon',
            'personage_upload_path' => '/uploads/avatar',
            'location_upload_path' => '/uploads/location',
            'kernel.trusted_host' => array(
                0 => '^(.*\\.)?shenteon.com$',
                1 => '^(.*\\.)?gdr.dev$',
            ),
            'user.listener.activity.class' => 'Gdr\\UserBundle\\Listener\\Activity',
            'request_injector' => 'Gdr\\UserBundle\\Listener\\RequestInjector',
            'authentication_handler' => 'Gdr\\UserBundle\\Handler\\AuthenticationHandler',
            'user.listener.encoderpassword.class' => 'Gdr\\UserBundle\\Listener\\EncoderPassword',
            'controller_resolver.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerResolver',
            'controller_name_converter.class' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\ControllerNameParser',
            'response_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\ResponseListener',
            'streamed_response_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\StreamedResponseListener',
            'locale_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\LocaleListener',
            'event_dispatcher.class' => 'Symfony\\Component\\EventDispatcher\\ContainerAwareEventDispatcher',
            'http_kernel.class' => 'Symfony\\Component\\HttpKernel\\DependencyInjection\\ContainerAwareHttpKernel',
            'filesystem.class' => 'Symfony\\Component\\Filesystem\\Filesystem',
            'cache_warmer.class' => 'Symfony\\Component\\HttpKernel\\CacheWarmer\\CacheWarmerAggregate',
            'cache_clearer.class' => 'Symfony\\Component\\HttpKernel\\CacheClearer\\ChainCacheClearer',
            'file_locator.class' => 'Symfony\\Component\\HttpKernel\\Config\\FileLocator',
            'uri_signer.class' => 'Symfony\\Component\\HttpKernel\\UriSigner',
            'request_stack.class' => 'Symfony\\Component\\HttpFoundation\\RequestStack',
            'fragment.handler.class' => 'Symfony\\Component\\HttpKernel\\DependencyInjection\\LazyLoadingFragmentHandler',
            'fragment.renderer.inline.class' => 'Symfony\\Component\\HttpKernel\\Fragment\\InlineFragmentRenderer',
            'fragment.renderer.hinclude.class' => 'Symfony\\Component\\HttpKernel\\Fragment\\HIncludeFragmentRenderer',
            'fragment.renderer.hinclude.global_template' => NULL,
            'fragment.renderer.esi.class' => 'Symfony\\Component\\HttpKernel\\Fragment\\EsiFragmentRenderer',
            'fragment.path' => '/_fragment',
            'translator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\Translator',
            'translator.identity.class' => 'Symfony\\Component\\Translation\\IdentityTranslator',
            'translator.selector.class' => 'Symfony\\Component\\Translation\\MessageSelector',
            'translation.loader.php.class' => 'Symfony\\Component\\Translation\\Loader\\PhpFileLoader',
            'translation.loader.yml.class' => 'Symfony\\Component\\Translation\\Loader\\YamlFileLoader',
            'translation.loader.xliff.class' => 'Symfony\\Component\\Translation\\Loader\\XliffFileLoader',
            'translation.loader.po.class' => 'Symfony\\Component\\Translation\\Loader\\PoFileLoader',
            'translation.loader.mo.class' => 'Symfony\\Component\\Translation\\Loader\\MoFileLoader',
            'translation.loader.qt.class' => 'Symfony\\Component\\Translation\\Loader\\QtFileLoader',
            'translation.loader.csv.class' => 'Symfony\\Component\\Translation\\Loader\\CsvFileLoader',
            'translation.loader.res.class' => 'Symfony\\Component\\Translation\\Loader\\IcuResFileLoader',
            'translation.loader.dat.class' => 'Symfony\\Component\\Translation\\Loader\\IcuDatFileLoader',
            'translation.loader.ini.class' => 'Symfony\\Component\\Translation\\Loader\\IniFileLoader',
            'translation.loader.json.class' => 'Symfony\\Component\\Translation\\Loader\\JsonFileLoader',
            'translation.dumper.php.class' => 'Symfony\\Component\\Translation\\Dumper\\PhpFileDumper',
            'translation.dumper.xliff.class' => 'Symfony\\Component\\Translation\\Dumper\\XliffFileDumper',
            'translation.dumper.po.class' => 'Symfony\\Component\\Translation\\Dumper\\PoFileDumper',
            'translation.dumper.mo.class' => 'Symfony\\Component\\Translation\\Dumper\\MoFileDumper',
            'translation.dumper.yml.class' => 'Symfony\\Component\\Translation\\Dumper\\YamlFileDumper',
            'translation.dumper.qt.class' => 'Symfony\\Component\\Translation\\Dumper\\QtFileDumper',
            'translation.dumper.csv.class' => 'Symfony\\Component\\Translation\\Dumper\\CsvFileDumper',
            'translation.dumper.ini.class' => 'Symfony\\Component\\Translation\\Dumper\\IniFileDumper',
            'translation.dumper.json.class' => 'Symfony\\Component\\Translation\\Dumper\\JsonFileDumper',
            'translation.dumper.res.class' => 'Symfony\\Component\\Translation\\Dumper\\IcuResFileDumper',
            'translation.extractor.php.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\PhpExtractor',
            'translation.loader.class' => 'Symfony\\Bundle\\FrameworkBundle\\Translation\\TranslationLoader',
            'translation.extractor.class' => 'Symfony\\Component\\Translation\\Extractor\\ChainExtractor',
            'translation.writer.class' => 'Symfony\\Component\\Translation\\Writer\\TranslationWriter',
            'property_accessor.class' => 'Symfony\\Component\\PropertyAccess\\PropertyAccessor',
            'kernel.secret' => '8eb83fe916d7bdf9e563336ecb84d4e8',
            'kernel.http_method_override' => true,
            'kernel.trusted_hosts' => array(
                0 => '^(.*\\.)?shenteon.com$',
                1 => '^(.*\\.)?gdr.dev$',
            ),
            'kernel.trusted_proxies' => array(
                0 => '127.0.0.1',
                1 => '192.0.0.1',
                2 => '10.0.0.0/8',
                3 => '173.245.53.233',
                4 => '127.0.0.1',
                5 => '192.0.0.1',
                6 => '10.0.0.0/8',
                7 => '173.245.53.233',
            ),
            'kernel.default_locale' => 'it',
            'session.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Session',
            'session.flashbag.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Flash\\FlashBag',
            'session.attribute_bag.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Attribute\\AttributeBag',
            'session.storage.metadata_bag.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MetadataBag',
            'session.metadata.storage_key' => '_sf2_meta',
            'session.storage.native.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\NativeSessionStorage',
            'session.storage.php_bridge.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\PhpBridgeSessionStorage',
            'session.storage.mock_file.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\MockFileSessionStorage',
            'session.handler.native_file.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\NativeFileSessionHandler',
            'session.handler.write_check.class' => 'Symfony\\Component\\HttpFoundation\\Session\\Storage\\Handler\\WriteCheckSessionHandler',
            'session_listener.class' => 'Symfony\\Bundle\\FrameworkBundle\\EventListener\\SessionListener',
            'session.storage.options' => array(
                'cookie_lifetime' => 0,
                'cookie_httponly' => false,
                'gc_probability' => 1,
            ),
            'session.save_path' => ($this->targetDirs[2].'/Sessions/'),
            'session.metadata.update_threshold' => '0',
            'security.secure_random.class' => 'Symfony\\Component\\Security\\Core\\Util\\SecureRandom',
            'form.resolved_type_factory.class' => 'Symfony\\Component\\Form\\ResolvedFormTypeFactory',
            'form.registry.class' => 'Symfony\\Component\\Form\\FormRegistry',
            'form.factory.class' => 'Symfony\\Component\\Form\\FormFactory',
            'form.extension.class' => 'Symfony\\Component\\Form\\Extension\\DependencyInjection\\DependencyInjectionExtension',
            'form.type_guesser.validator.class' => 'Symfony\\Component\\Form\\Extension\\Validator\\ValidatorTypeGuesser',
            'form.type_extension.form.request_handler.class' => 'Symfony\\Component\\Form\\Extension\\HttpFoundation\\HttpFoundationRequestHandler',
            'form.type_extension.csrf.enabled' => true,
            'form.type_extension.csrf.field_name' => '_token',
            'security.csrf.token_generator.class' => 'Symfony\\Component\\Security\\Csrf\\TokenGenerator\\UriSafeTokenGenerator',
            'security.csrf.token_storage.class' => 'Symfony\\Component\\Security\\Csrf\\TokenStorage\\SessionTokenStorage',
            'security.csrf.token_manager.class' => 'Symfony\\Component\\Security\\Csrf\\CsrfTokenManager',
            'templating.engine.delegating.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\DelegatingEngine',
            'templating.name_parser.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\TemplateNameParser',
            'templating.filename_parser.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\TemplateFilenameParser',
            'templating.cache_warmer.template_paths.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\TemplatePathsCacheWarmer',
            'templating.locator.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Loader\\TemplateLocator',
            'templating.loader.filesystem.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Loader\\FilesystemLoader',
            'templating.loader.cache.class' => 'Symfony\\Component\\Templating\\Loader\\CacheLoader',
            'templating.loader.chain.class' => 'Symfony\\Component\\Templating\\Loader\\ChainLoader',
            'templating.finder.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\TemplateFinder',
            'templating.helper.assets.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\AssetsHelper',
            'templating.helper.router.class' => 'Symfony\\Bundle\\FrameworkBundle\\Templating\\Helper\\RouterHelper',
            'templating.helper.code.file_link_format' => NULL,
            'templating.loader.cache.path' => NULL,
            'templating.engines' => array(
                0 => 'twig',
            ),
            'validator.class' => 'Symfony\\Component\\Validator\\Validator\\ValidatorInterface',
            'validator.builder.class' => 'Symfony\\Component\\Validator\\ValidatorBuilderInterface',
            'validator.builder.factory.class' => 'Symfony\\Component\\Validator\\Validation',
            'validator.mapping.cache.apc.class' => 'Symfony\\Component\\Validator\\Mapping\\Cache\\ApcCache',
            'validator.mapping.cache.prefix' => 'validator_1afc8d46b02187468798c82da8894846684aa065107ad74e8b0b3e649194c896',
            'validator.validator_factory.class' => 'Symfony\\Bundle\\FrameworkBundle\\Validator\\ConstraintValidatorFactory',
            'validator.expression.class' => 'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator',
            'validator.email.class' => 'Symfony\\Component\\Validator\\Constraints\\EmailValidator',
            'validator.translation_domain' => 'validators',
            'validator.api' => '2.5-bc',
            'fragment.listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\FragmentListener',
            'translator.logging' => false,
            'data_collector.templates' => array(
            ),
            'router.class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\Router',
            'router.request_context.class' => 'Symfony\\Component\\Routing\\RequestContext',
            'routing.loader.class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\DelegatingLoader',
            'routing.resolver.class' => 'Symfony\\Component\\Config\\Loader\\LoaderResolver',
            'routing.loader.xml.class' => 'Symfony\\Component\\Routing\\Loader\\XmlFileLoader',
            'routing.loader.yml.class' => 'Symfony\\Component\\Routing\\Loader\\YamlFileLoader',
            'routing.loader.php.class' => 'Symfony\\Component\\Routing\\Loader\\PhpFileLoader',
            'router.options.generator_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_base_class' => 'Symfony\\Component\\Routing\\Generator\\UrlGenerator',
            'router.options.generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\PhpGeneratorDumper',
            'router.options.matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_base_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableUrlMatcher',
            'router.options.matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\PhpMatcherDumper',
            'router.cache_warmer.class' => 'Symfony\\Bundle\\FrameworkBundle\\CacheWarmer\\RouterCacheWarmer',
            'router.options.matcher.cache_class' => 'appProdUrlMatcher',
            'router.options.generator.cache_class' => 'appProdUrlGenerator',
            'router_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\RouterListener',
            'router.request_context.host' => 'localhost',
            'router.request_context.scheme' => 'http',
            'router.request_context.base_url' => '',
            'router.resource' => ($this->targetDirs[2].'/config/routing.yml'),
            'router.cache_class_prefix' => 'appProd',
            'request_listener.http_port' => 80,
            'request_listener.https_port' => 443,
            'annotations.reader.class' => 'Doctrine\\Common\\Annotations\\AnnotationReader',
            'annotations.cached_reader.class' => 'Doctrine\\Common\\Annotations\\CachedReader',
            'annotations.file_cache_reader.class' => 'Doctrine\\Common\\Annotations\\FileCacheReader',
            'debug.debug_handlers_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\DebugHandlersListener',
            'debug.stopwatch.class' => 'Symfony\\Component\\Stopwatch\\Stopwatch',
            'debug.error_handler.throw_at' => 0,
            'security.context.class' => 'Symfony\\Component\\Security\\Core\\SecurityContext',
            'security.user_checker.class' => 'Symfony\\Component\\Security\\Core\\User\\UserChecker',
            'security.encoder_factory.generic.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\EncoderFactory',
            'security.encoder.digest.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\MessageDigestPasswordEncoder',
            'security.encoder.plain.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\PlaintextPasswordEncoder',
            'security.encoder.pbkdf2.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\Pbkdf2PasswordEncoder',
            'security.encoder.bcrypt.class' => 'Symfony\\Component\\Security\\Core\\Encoder\\BCryptPasswordEncoder',
            'security.user.provider.in_memory.class' => 'Symfony\\Component\\Security\\Core\\User\\InMemoryUserProvider',
            'security.user.provider.in_memory.user.class' => 'Symfony\\Component\\Security\\Core\\User\\User',
            'security.user.provider.chain.class' => 'Symfony\\Component\\Security\\Core\\User\\ChainUserProvider',
            'security.authentication.trust_resolver.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\AuthenticationTrustResolver',
            'security.authentication.trust_resolver.anonymous_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\AnonymousToken',
            'security.authentication.trust_resolver.rememberme_class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Token\\RememberMeToken',
            'security.authentication.manager.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\AuthenticationProviderManager',
            'security.authentication.session_strategy.class' => 'Symfony\\Component\\Security\\Http\\Session\\SessionAuthenticationStrategy',
            'security.access.decision_manager.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\AccessDecisionManager',
            'security.access.simple_role_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\RoleVoter',
            'security.access.authenticated_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\AuthenticatedVoter',
            'security.access.role_hierarchy_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\RoleHierarchyVoter',
            'security.access.expression_voter.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\Voter\\ExpressionVoter',
            'security.firewall.class' => 'Symfony\\Component\\Security\\Http\\Firewall',
            'security.firewall.map.class' => 'Symfony\\Bundle\\SecurityBundle\\Security\\FirewallMap',
            'security.firewall.context.class' => 'Symfony\\Bundle\\SecurityBundle\\Security\\FirewallContext',
            'security.matcher.class' => 'Symfony\\Component\\HttpFoundation\\RequestMatcher',
            'security.expression_matcher.class' => 'Symfony\\Component\\HttpFoundation\\ExpressionRequestMatcher',
            'security.role_hierarchy.class' => 'Symfony\\Component\\Security\\Core\\Role\\RoleHierarchy',
            'security.http_utils.class' => 'Symfony\\Component\\Security\\Http\\HttpUtils',
            'security.validator.user_password.class' => 'Symfony\\Component\\Security\\Core\\Validator\\Constraints\\UserPasswordValidator',
            'security.expression_language.class' => 'Symfony\\Component\\Security\\Core\\Authorization\\ExpressionLanguage',
            'security.role_hierarchy.roles' => array(
                'ROLE_ADMIN' => array(
                    0 => 'ROLE_USER',
                    1 => 'ROLE_ALLOWED_TO_SWITCH',
                    2 => 'ROLE_SONATA_ADMIN',
                ),
                'ROLE_SUPER_ADMIN' => array(
                    0 => 'ROLE_USER',
                    1 => 'ROLE_ADMIN',
                    2 => 'ROLE_ALLOWED_TO_SWITCH',
                    3 => 'ROLE_SONATA_ADMIN',
                ),
            ),
            'security.authentication.retry_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\RetryAuthenticationEntryPoint',
            'security.channel_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ChannelListener',
            'security.authentication.form_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\FormAuthenticationEntryPoint',
            'security.authentication.listener.form.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\UsernamePasswordFormAuthenticationListener',
            'security.authentication.listener.simple_form.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\SimpleFormAuthenticationListener',
            'security.authentication.listener.simple_preauth.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\SimplePreAuthenticationListener',
            'security.authentication.listener.basic.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\BasicAuthenticationListener',
            'security.authentication.basic_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\BasicAuthenticationEntryPoint',
            'security.authentication.listener.digest.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\DigestAuthenticationListener',
            'security.authentication.digest_entry_point.class' => 'Symfony\\Component\\Security\\Http\\EntryPoint\\DigestAuthenticationEntryPoint',
            'security.authentication.listener.x509.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\X509AuthenticationListener',
            'security.authentication.listener.anonymous.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\AnonymousAuthenticationListener',
            'security.authentication.switchuser_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\SwitchUserListener',
            'security.logout_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\LogoutListener',
            'security.logout.handler.session.class' => 'Symfony\\Component\\Security\\Http\\Logout\\SessionLogoutHandler',
            'security.logout.handler.cookie_clearing.class' => 'Symfony\\Component\\Security\\Http\\Logout\\CookieClearingLogoutHandler',
            'security.logout.success_handler.class' => 'Symfony\\Component\\Security\\Http\\Logout\\DefaultLogoutSuccessHandler',
            'security.access_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\AccessListener',
            'security.access_map.class' => 'Symfony\\Component\\Security\\Http\\AccessMap',
            'security.exception_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ExceptionListener',
            'security.context_listener.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\ContextListener',
            'security.authentication.provider.dao.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\DaoAuthenticationProvider',
            'security.authentication.provider.simple.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\SimpleAuthenticationProvider',
            'security.authentication.provider.pre_authenticated.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\PreAuthenticatedAuthenticationProvider',
            'security.authentication.provider.anonymous.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\AnonymousAuthenticationProvider',
            'security.authentication.success_handler.class' => 'Symfony\\Component\\Security\\Http\\Authentication\\DefaultAuthenticationSuccessHandler',
            'security.authentication.failure_handler.class' => 'Symfony\\Component\\Security\\Http\\Authentication\\DefaultAuthenticationFailureHandler',
            'security.authentication.simple_success_failure_handler.class' => 'Symfony\\Component\\Security\\Http\\Authentication\\SimpleAuthenticationHandler',
            'security.authentication.provider.rememberme.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\Provider\\RememberMeAuthenticationProvider',
            'security.authentication.listener.rememberme.class' => 'Symfony\\Component\\Security\\Http\\Firewall\\RememberMeListener',
            'security.rememberme.token.provider.in_memory.class' => 'Symfony\\Component\\Security\\Core\\Authentication\\RememberMe\\InMemoryTokenProvider',
            'security.authentication.rememberme.services.persistent.class' => 'Symfony\\Component\\Security\\Http\\RememberMe\\PersistentTokenBasedRememberMeServices',
            'security.authentication.rememberme.services.simplehash.class' => 'Symfony\\Component\\Security\\Http\\RememberMe\\TokenBasedRememberMeServices',
            'security.rememberme.response_listener.class' => 'Symfony\\Component\\Security\\Http\\RememberMe\\ResponseListener',
            'templating.helper.logout_url.class' => 'Symfony\\Bundle\\SecurityBundle\\Templating\\Helper\\LogoutUrlHelper',
            'templating.helper.security.class' => 'Symfony\\Bundle\\SecurityBundle\\Templating\\Helper\\SecurityHelper',
            'twig.extension.logout_url.class' => 'Symfony\\Bridge\\Twig\\Extension\\LogoutUrlExtension',
            'twig.extension.security.class' => 'Symfony\\Bridge\\Twig\\Extension\\SecurityExtension',
            'data_collector.security.class' => 'Symfony\\Bundle\\SecurityBundle\\DataCollector\\SecurityDataCollector',
            'security.access.denied_url' => NULL,
            'security.authentication.manager.erase_credentials' => true,
            'security.authentication.session_strategy.strategy' => 'migrate',
            'security.access.always_authenticate_before_granting' => false,
            'security.authentication.hide_user_not_found' => true,
            'twig.class' => 'Twig_Environment',
            'twig.loader.filesystem.class' => 'Symfony\\Bundle\\TwigBundle\\Loader\\FilesystemLoader',
            'twig.loader.chain.class' => 'Twig_Loader_Chain',
            'templating.engine.twig.class' => 'Symfony\\Bundle\\TwigBundle\\TwigEngine',
            'twig.cache_warmer.class' => 'Symfony\\Bundle\\TwigBundle\\CacheWarmer\\TemplateCacheCacheWarmer',
            'twig.extension.trans.class' => 'Symfony\\Bridge\\Twig\\Extension\\TranslationExtension',
            'twig.extension.actions.class' => 'Symfony\\Bundle\\TwigBundle\\Extension\\ActionsExtension',
            'twig.extension.code.class' => 'Symfony\\Bridge\\Twig\\Extension\\CodeExtension',
            'twig.extension.routing.class' => 'Symfony\\Bridge\\Twig\\Extension\\RoutingExtension',
            'twig.extension.yaml.class' => 'Symfony\\Bridge\\Twig\\Extension\\YamlExtension',
            'twig.extension.form.class' => 'Symfony\\Bridge\\Twig\\Extension\\FormExtension',
            'twig.extension.httpkernel.class' => 'Symfony\\Bridge\\Twig\\Extension\\HttpKernelExtension',
            'twig.extension.debug.stopwatch.class' => 'Symfony\\Bridge\\Twig\\Extension\\StopwatchExtension',
            'twig.extension.expression.class' => 'Symfony\\Bridge\\Twig\\Extension\\ExpressionExtension',
            'twig.form.engine.class' => 'Symfony\\Bridge\\Twig\\Form\\TwigRendererEngine',
            'twig.form.renderer.class' => 'Symfony\\Bridge\\Twig\\Form\\TwigRenderer',
            'twig.translation.extractor.class' => 'Symfony\\Bridge\\Twig\\Translation\\TwigExtractor',
            'twig.exception_listener.class' => 'Symfony\\Component\\HttpKernel\\EventListener\\ExceptionListener',
            'twig.controller.exception.class' => 'Symfony\\Bundle\\TwigBundle\\Controller\\ExceptionController',
            'twig.controller.preview_error.class' => 'Symfony\\Bundle\\TwigBundle\\Controller\\PreviewErrorController',
            'twig.exception_listener.controller' => 'twig.controller.exception:showAction',
            'twig.form.resources' => array(
                0 => 'form_div_layout.html.twig',
                1 => 'IvoryCKEditorBundle:Form:ckeditor_widget.html.twig',
            ),
            'monolog.logger.class' => 'Symfony\\Bridge\\Monolog\\Logger',
            'monolog.gelf.publisher.class' => 'Gelf\\MessagePublisher',
            'monolog.gelfphp.publisher.class' => 'Gelf\\Publisher',
            'monolog.handler.stream.class' => 'Monolog\\Handler\\StreamHandler',
            'monolog.handler.console.class' => 'Symfony\\Bridge\\Monolog\\Handler\\ConsoleHandler',
            'monolog.handler.group.class' => 'Monolog\\Handler\\GroupHandler',
            'monolog.handler.buffer.class' => 'Monolog\\Handler\\BufferHandler',
            'monolog.handler.rotating_file.class' => 'Monolog\\Handler\\RotatingFileHandler',
            'monolog.handler.syslog.class' => 'Monolog\\Handler\\SyslogHandler',
            'monolog.handler.syslogudp.class' => 'Monolog\\Handler\\SyslogUdpHandler',
            'monolog.handler.null.class' => 'Monolog\\Handler\\NullHandler',
            'monolog.handler.test.class' => 'Monolog\\Handler\\TestHandler',
            'monolog.handler.gelf.class' => 'Monolog\\Handler\\GelfHandler',
            'monolog.handler.rollbar.class' => 'Monolog\\Handler\\RollbarHandler',
            'monolog.handler.flowdock.class' => 'Monolog\\Handler\\FlowdockHandler',
            'monolog.handler.browser_console.class' => 'Monolog\\Handler\\BrowserConsoleHandler',
            'monolog.handler.firephp.class' => 'Symfony\\Bridge\\Monolog\\Handler\\FirePHPHandler',
            'monolog.handler.chromephp.class' => 'Symfony\\Bridge\\Monolog\\Handler\\ChromePhpHandler',
            'monolog.handler.debug.class' => 'Symfony\\Bridge\\Monolog\\Handler\\DebugHandler',
            'monolog.handler.swift_mailer.class' => 'Symfony\\Bridge\\Monolog\\Handler\\SwiftMailerHandler',
            'monolog.handler.native_mailer.class' => 'Monolog\\Handler\\NativeMailerHandler',
            'monolog.handler.socket.class' => 'Monolog\\Handler\\SocketHandler',
            'monolog.handler.pushover.class' => 'Monolog\\Handler\\PushoverHandler',
            'monolog.handler.raven.class' => 'Monolog\\Handler\\RavenHandler',
            'monolog.handler.newrelic.class' => 'Monolog\\Handler\\NewRelicHandler',
            'monolog.handler.hipchat.class' => 'Monolog\\Handler\\HipChatHandler',
            'monolog.handler.slack.class' => 'Monolog\\Handler\\SlackHandler',
            'monolog.handler.cube.class' => 'Monolog\\Handler\\CubeHandler',
            'monolog.handler.amqp.class' => 'Monolog\\Handler\\AmqpHandler',
            'monolog.handler.error_log.class' => 'Monolog\\Handler\\ErrorLogHandler',
            'monolog.handler.loggly.class' => 'Monolog\\Handler\\LogglyHandler',
            'monolog.handler.logentries.class' => 'Monolog\\Handler\\LogEntriesHandler',
            'monolog.handler.whatfailuregroup.class' => 'Monolog\\Handler\\WhatFailureGroupHandler',
            'monolog.activation_strategy.not_found.class' => 'Symfony\\Bundle\\MonologBundle\\NotFoundActivationStrategy',
            'monolog.handler.fingers_crossed.class' => 'Monolog\\Handler\\FingersCrossedHandler',
            'monolog.handler.fingers_crossed.error_level_activation_strategy.class' => 'Monolog\\Handler\\FingersCrossed\\ErrorLevelActivationStrategy',
            'monolog.handler.filter.class' => 'Monolog\\Handler\\FilterHandler',
            'monolog.handler.mongo.class' => 'Monolog\\Handler\\MongoDBHandler',
            'monolog.mongo.client.class' => 'MongoClient',
            'monolog.handler.elasticsearch.class' => 'Monolog\\Handler\\ElasticSearchHandler',
            'monolog.elastica.client.class' => 'Elastica\\Client',
            'monolog.swift_mailer.handlers' => array(
                0 => 'monolog.handler.swift',
            ),
            'monolog.handlers_to_channels' => array(
                'monolog.handler.main' => NULL,
                'monolog.handler.cron' => array(
                    'type' => 'inclusive',
                    'elements' => array(
                        0 => 'cron',
                    ),
                ),
            ),
            'swiftmailer.class' => 'Swift_Mailer',
            'swiftmailer.transport.sendmail.class' => 'Swift_Transport_SendmailTransport',
            'swiftmailer.transport.mail.class' => 'Swift_Transport_MailTransport',
            'swiftmailer.transport.failover.class' => 'Swift_Transport_FailoverTransport',
            'swiftmailer.plugin.redirecting.class' => 'Swift_Plugins_RedirectingPlugin',
            'swiftmailer.plugin.impersonate.class' => 'Swift_Plugins_ImpersonatePlugin',
            'swiftmailer.plugin.messagelogger.class' => 'Swift_Plugins_MessageLogger',
            'swiftmailer.plugin.antiflood.class' => 'Swift_Plugins_AntiFloodPlugin',
            'swiftmailer.transport.smtp.class' => 'Swift_Transport_EsmtpTransport',
            'swiftmailer.plugin.blackhole.class' => 'Swift_Plugins_BlackholePlugin',
            'swiftmailer.spool.file.class' => 'Swift_FileSpool',
            'swiftmailer.spool.memory.class' => 'Swift_MemorySpool',
            'swiftmailer.email_sender.listener.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\EventListener\\EmailSenderListener',
            'swiftmailer.data_collector.class' => 'Symfony\\Bundle\\SwiftmailerBundle\\DataCollector\\MessageDataCollector',
            'swiftmailer.mailer.default.transport.name' => 'smtp',
            'swiftmailer.mailer.default.delivery.enabled' => true,
            'swiftmailer.mailer.default.transport.smtp.encryption' => NULL,
            'swiftmailer.mailer.default.transport.smtp.port' => 25,
            'swiftmailer.mailer.default.transport.smtp.host' => 'localhost',
            'swiftmailer.mailer.default.transport.smtp.username' => 'gestione@shenteon.com',
            'swiftmailer.mailer.default.transport.smtp.password' => 'jL3yUdo5nXeVILa',
            'swiftmailer.mailer.default.transport.smtp.auth_mode' => NULL,
            'swiftmailer.mailer.default.transport.smtp.timeout' => 30,
            'swiftmailer.mailer.default.transport.smtp.source_ip' => NULL,
            'swiftmailer.spool.default.memory.path' => (__DIR__.'/swiftmailer/spool/default'),
            'swiftmailer.mailer.default.spool.enabled' => true,
            'swiftmailer.mailer.default.plugin.impersonate' => NULL,
            'swiftmailer.mailer.default.single_address' => NULL,
            'swiftmailer.spool.enabled' => true,
            'swiftmailer.delivery.enabled' => true,
            'swiftmailer.single_address' => NULL,
            'swiftmailer.mailers' => array(
                'default' => 'swiftmailer.mailer.default',
            ),
            'swiftmailer.default_mailer' => 'default',
            'assetic.asset_factory.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\AssetFactory',
            'assetic.asset_manager.class' => 'Assetic\\Factory\\LazyAssetManager',
            'assetic.asset_manager_cache_warmer.class' => 'Symfony\\Bundle\\AsseticBundle\\CacheWarmer\\AssetManagerCacheWarmer',
            'assetic.cached_formula_loader.class' => 'Assetic\\Factory\\Loader\\CachedFormulaLoader',
            'assetic.config_cache.class' => 'Assetic\\Cache\\ConfigCache',
            'assetic.config_loader.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Loader\\ConfigurationLoader',
            'assetic.config_resource.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Resource\\ConfigurationResource',
            'assetic.coalescing_directory_resource.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Resource\\CoalescingDirectoryResource',
            'assetic.directory_resource.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Resource\\DirectoryResource',
            'assetic.filter_manager.class' => 'Symfony\\Bundle\\AsseticBundle\\FilterManager',
            'assetic.worker.ensure_filter.class' => 'Assetic\\Factory\\Worker\\EnsureFilterWorker',
            'assetic.worker.cache_busting.class' => 'Assetic\\Factory\\Worker\\CacheBustingWorker',
            'assetic.value_supplier.class' => 'Symfony\\Bundle\\AsseticBundle\\DefaultValueSupplier',
            'assetic.node.paths' => array(
            ),
            'assetic.cache_dir' => (__DIR__.'/assetic'),
            'assetic.bundles' => array(
                0 => 'GdrSiteBundle',
                1 => 'GdrGameBundle',
                2 => 'GdrAvatarBundle',
                3 => 'GdrAdministrationBundle',
                4 => 'GdrUserBundle',
            ),
            'assetic.twig_extension.class' => 'Symfony\\Bundle\\AsseticBundle\\Twig\\AsseticExtension',
            'assetic.twig_formula_loader.class' => 'Assetic\\Extension\\Twig\\TwigFormulaLoader',
            'assetic.helper.dynamic.class' => 'Symfony\\Bundle\\AsseticBundle\\Templating\\DynamicAsseticHelper',
            'assetic.helper.static.class' => 'Symfony\\Bundle\\AsseticBundle\\Templating\\StaticAsseticHelper',
            'assetic.php_formula_loader.class' => 'Symfony\\Bundle\\AsseticBundle\\Factory\\Loader\\AsseticHelperFormulaLoader',
            'assetic.debug' => false,
            'assetic.use_controller' => false,
            'assetic.enable_profiler' => false,
            'assetic.read_from' => ($this->targetDirs[2].'/../web'),
            'assetic.write_to' => ($this->targetDirs[2].'/../web'),
            'assetic.variables' => array(
            ),
            'assetic.java.bin' => '/usr/bin/java',
            'assetic.node.bin' => '/usr/bin/node',
            'assetic.ruby.bin' => '/usr/bin/ruby',
            'assetic.sass.bin' => '/usr/bin/sass',
            'assetic.reactjsx.bin' => '/usr/bin/jsx',
            'assetic.filter.cssrewrite.class' => 'Assetic\\Filter\\CssRewriteFilter',
            'assetic.filter.uglifyjs2.class' => 'Assetic\\Filter\\UglifyJs2Filter',
            'assetic.filter.uglifyjs2.bin' => '/usr/local/bin/uglifyjs',
            'assetic.filter.uglifyjs2.node' => '/usr/bin/node',
            'assetic.filter.uglifyjs2.timeout' => NULL,
            'assetic.filter.uglifyjs2.node_paths' => array(
            ),
            'assetic.filter.uglifyjs2.compress' => false,
            'assetic.filter.uglifyjs2.beautify' => false,
            'assetic.filter.uglifyjs2.mangle' => false,
            'assetic.filter.uglifyjs2.screw_ie8' => false,
            'assetic.filter.uglifyjs2.comments' => false,
            'assetic.filter.uglifyjs2.wrap' => false,
            'assetic.filter.uglifyjs2.defines' => array(
            ),
            'assetic.filter.uglifycss.class' => 'Assetic\\Filter\\UglifyCssFilter',
            'assetic.filter.uglifycss.bin' => '/usr/local/bin/uglifycss',
            'assetic.filter.uglifycss.node' => '/usr/bin/node',
            'assetic.filter.uglifycss.timeout' => NULL,
            'assetic.filter.uglifycss.node_paths' => array(
            ),
            'assetic.filter.uglifycss.expand_vars' => false,
            'assetic.filter.uglifycss.ugly_comments' => false,
            'assetic.filter.uglifycss.cute_comments' => false,
            'assetic.twig_extension.functions' => array(
            ),
            'doctrine_cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine_cache.apcu.class' => 'Doctrine\\Common\\Cache\\ApcuCache',
            'doctrine_cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine_cache.chain.class' => 'Doctrine\\Common\\Cache\\ChainCache',
            'doctrine_cache.couchbase.class' => 'Doctrine\\Common\\Cache\\CouchbaseCache',
            'doctrine_cache.couchbase.connection.class' => 'Couchbase',
            'doctrine_cache.couchbase.hostnames' => 'localhost:8091',
            'doctrine_cache.file_system.class' => 'Doctrine\\Common\\Cache\\FilesystemCache',
            'doctrine_cache.php_file.class' => 'Doctrine\\Common\\Cache\\PhpFileCache',
            'doctrine_cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine_cache.memcache.connection.class' => 'Memcache',
            'doctrine_cache.memcache.host' => 'localhost',
            'doctrine_cache.memcache.port' => 11211,
            'doctrine_cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine_cache.memcached.connection.class' => 'Memcached',
            'doctrine_cache.memcached.host' => 'localhost',
            'doctrine_cache.memcached.port' => 11211,
            'doctrine_cache.mongodb.class' => 'Doctrine\\Common\\Cache\\MongoDBCache',
            'doctrine_cache.mongodb.collection.class' => 'MongoCollection',
            'doctrine_cache.mongodb.connection.class' => 'MongoClient',
            'doctrine_cache.mongodb.server' => 'localhost:27017',
            'doctrine_cache.predis.client.class' => 'Predis\\Client',
            'doctrine_cache.predis.scheme' => 'tcp',
            'doctrine_cache.predis.host' => 'localhost',
            'doctrine_cache.predis.port' => 6379,
            'doctrine_cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine_cache.redis.connection.class' => 'Redis',
            'doctrine_cache.redis.host' => 'localhost',
            'doctrine_cache.redis.port' => 6379,
            'doctrine_cache.riak.class' => 'Doctrine\\Common\\Cache\\RiakCache',
            'doctrine_cache.riak.bucket.class' => 'Riak\\Bucket',
            'doctrine_cache.riak.connection.class' => 'Riak\\Connection',
            'doctrine_cache.riak.bucket_property_list.class' => 'Riak\\BucketPropertyList',
            'doctrine_cache.riak.host' => 'localhost',
            'doctrine_cache.riak.port' => 8087,
            'doctrine_cache.sqlite3.class' => 'Doctrine\\Common\\Cache\\SQLite3Cache',
            'doctrine_cache.sqlite3.connection.class' => 'SQLite3',
            'doctrine_cache.void.class' => 'Doctrine\\Common\\Cache\\VoidCache',
            'doctrine_cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine_cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine_cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine_cache.security.acl.cache.class' => 'Doctrine\\Bundle\\DoctrineCacheBundle\\Acl\\Model\\AclCache',
            'doctrine.dbal.logger.chain.class' => 'Doctrine\\DBAL\\Logging\\LoggerChain',
            'doctrine.dbal.logger.profiling.class' => 'Doctrine\\DBAL\\Logging\\DebugStack',
            'doctrine.dbal.logger.class' => 'Symfony\\Bridge\\Doctrine\\Logger\\DbalLogger',
            'doctrine.dbal.configuration.class' => 'Doctrine\\DBAL\\Configuration',
            'doctrine.data_collector.class' => 'Doctrine\\Bundle\\DoctrineBundle\\DataCollector\\DoctrineDataCollector',
            'doctrine.dbal.connection.event_manager.class' => 'Symfony\\Bridge\\Doctrine\\ContainerAwareEventManager',
            'doctrine.dbal.connection_factory.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ConnectionFactory',
            'doctrine.dbal.events.mysql_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\MysqlSessionInit',
            'doctrine.dbal.events.oracle_session_init.class' => 'Doctrine\\DBAL\\Event\\Listeners\\OracleSessionInit',
            'doctrine.class' => 'Doctrine\\Bundle\\DoctrineBundle\\Registry',
            'doctrine.entity_managers' => array(
                'default' => 'doctrine.orm.default_entity_manager',
            ),
            'doctrine.default_entity_manager' => 'default',
            'doctrine.dbal.connection_factory.types' => array(
            ),
            'doctrine.connections' => array(
                'default' => 'doctrine.dbal.default_connection',
            ),
            'doctrine.default_connection' => 'default',
            'doctrine.orm.configuration.class' => 'Doctrine\\ORM\\Configuration',
            'doctrine.orm.entity_manager.class' => 'Doctrine\\ORM\\EntityManager',
            'doctrine.orm.manager_configurator.class' => 'Doctrine\\Bundle\\DoctrineBundle\\ManagerConfigurator',
            'doctrine.orm.cache.array.class' => 'Doctrine\\Common\\Cache\\ArrayCache',
            'doctrine.orm.cache.apc.class' => 'Doctrine\\Common\\Cache\\ApcCache',
            'doctrine.orm.cache.memcache.class' => 'Doctrine\\Common\\Cache\\MemcacheCache',
            'doctrine.orm.cache.memcache_host' => 'localhost',
            'doctrine.orm.cache.memcache_port' => 11211,
            'doctrine.orm.cache.memcache_instance.class' => 'Memcache',
            'doctrine.orm.cache.memcached.class' => 'Doctrine\\Common\\Cache\\MemcachedCache',
            'doctrine.orm.cache.memcached_host' => 'localhost',
            'doctrine.orm.cache.memcached_port' => 11211,
            'doctrine.orm.cache.memcached_instance.class' => 'Memcached',
            'doctrine.orm.cache.redis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'doctrine.orm.cache.redis_host' => 'localhost',
            'doctrine.orm.cache.redis_port' => 6379,
            'doctrine.orm.cache.redis_instance.class' => 'Redis',
            'doctrine.orm.cache.xcache.class' => 'Doctrine\\Common\\Cache\\XcacheCache',
            'doctrine.orm.cache.wincache.class' => 'Doctrine\\Common\\Cache\\WinCacheCache',
            'doctrine.orm.cache.zenddata.class' => 'Doctrine\\Common\\Cache\\ZendDataCache',
            'doctrine.orm.metadata.driver_chain.class' => 'Doctrine\\Common\\Persistence\\Mapping\\Driver\\MappingDriverChain',
            'doctrine.orm.metadata.annotation.class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
            'doctrine.orm.metadata.xml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedXmlDriver',
            'doctrine.orm.metadata.yml.class' => 'Doctrine\\ORM\\Mapping\\Driver\\SimplifiedYamlDriver',
            'doctrine.orm.metadata.php.class' => 'Doctrine\\ORM\\Mapping\\Driver\\PHPDriver',
            'doctrine.orm.metadata.staticphp.class' => 'Doctrine\\ORM\\Mapping\\Driver\\StaticPHPDriver',
            'doctrine.orm.proxy_cache_warmer.class' => 'Symfony\\Bridge\\Doctrine\\CacheWarmer\\ProxyCacheWarmer',
            'form.type_guesser.doctrine.class' => 'Symfony\\Bridge\\Doctrine\\Form\\DoctrineOrmTypeGuesser',
            'doctrine.orm.validator.unique.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\Constraints\\UniqueEntityValidator',
            'doctrine.orm.validator_initializer.class' => 'Symfony\\Bridge\\Doctrine\\Validator\\DoctrineInitializer',
            'doctrine.orm.security.user.provider.class' => 'Symfony\\Bridge\\Doctrine\\Security\\User\\EntityUserProvider',
            'doctrine.orm.listeners.resolve_target_entity.class' => 'Doctrine\\ORM\\Tools\\ResolveTargetEntityListener',
            'doctrine.orm.listeners.attach_entity_listeners.class' => 'Doctrine\\ORM\\Tools\\AttachEntityListenersListener',
            'doctrine.orm.naming_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultNamingStrategy',
            'doctrine.orm.naming_strategy.underscore.class' => 'Doctrine\\ORM\\Mapping\\UnderscoreNamingStrategy',
            'doctrine.orm.quote_strategy.default.class' => 'Doctrine\\ORM\\Mapping\\DefaultQuoteStrategy',
            'doctrine.orm.quote_strategy.ansi.class' => 'Doctrine\\ORM\\Mapping\\AnsiQuoteStrategy',
            'doctrine.orm.entity_listener_resolver.class' => 'Doctrine\\ORM\\Mapping\\DefaultEntityListenerResolver',
            'doctrine.orm.second_level_cache.default_cache_factory.class' => 'Doctrine\\ORM\\Cache\\DefaultCacheFactory',
            'doctrine.orm.second_level_cache.default_region.class' => 'Doctrine\\ORM\\Cache\\Region\\DefaultRegion',
            'doctrine.orm.second_level_cache.filelock_region.class' => 'Doctrine\\ORM\\Cache\\Region\\FileLockRegion',
            'doctrine.orm.second_level_cache.logger_chain.class' => 'Doctrine\\ORM\\Cache\\Logging\\CacheLoggerChain',
            'doctrine.orm.second_level_cache.logger_statistics.class' => 'Doctrine\\ORM\\Cache\\Logging\\StatisticsCacheLogger',
            'doctrine.orm.second_level_cache.cache_configuration.class' => 'Doctrine\\ORM\\Cache\\CacheConfiguration',
            'doctrine.orm.second_level_cache.regions_configuration.class' => 'Doctrine\\ORM\\Cache\\RegionsConfiguration',
            'doctrine.orm.auto_generate_proxy_classes' => false,
            'doctrine.orm.proxy_dir' => (__DIR__.'/doctrine/orm/Proxies'),
            'doctrine.orm.proxy_namespace' => 'Proxies',
            'sensio_framework_extra.view.guesser.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Templating\\TemplateGuesser',
            'sensio_framework_extra.controller.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ControllerListener',
            'sensio_framework_extra.routing.loader.annot_dir.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationDirectoryLoader',
            'sensio_framework_extra.routing.loader.annot_file.class' => 'Symfony\\Component\\Routing\\Loader\\AnnotationFileLoader',
            'sensio_framework_extra.routing.loader.annot_class.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Routing\\AnnotatedRouteControllerLoader',
            'sensio_framework_extra.converter.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\ParamConverterListener',
            'sensio_framework_extra.converter.manager.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\ParamConverterManager',
            'sensio_framework_extra.converter.doctrine.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\DoctrineParamConverter',
            'sensio_framework_extra.converter.datetime.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\Request\\ParamConverter\\DateTimeParamConverter',
            'sensio_framework_extra.view.listener.class' => 'Sensio\\Bundle\\FrameworkExtraBundle\\EventListener\\TemplateListener',
            'jms_aop.cache_dir' => (__DIR__.'/jms_aop'),
            'jms_aop.interceptor_loader.class' => 'JMS\\AopBundle\\Aop\\InterceptorLoader',
            'jms_di_extra.metadata.driver.annotation_driver.class' => 'JMS\\DiExtraBundle\\Metadata\\Driver\\AnnotationDriver',
            'jms_di_extra.metadata.driver.configured_controller_injections.class' => 'JMS\\DiExtraBundle\\Metadata\\Driver\\ConfiguredControllerInjectionsDriver',
            'jms_di_extra.metadata.driver.lazy_loading_driver.class' => 'Metadata\\Driver\\LazyLoadingDriver',
            'jms_di_extra.service_naming_strategy.default.class' => 'JMS\\DiExtraBundle\\Metadata\\DefaultNamingStrategy',
            'jms_di_extra.metadata.metadata_factory.class' => 'Metadata\\MetadataFactory',
            'jms_di_extra.metadata.cache.file_cache.class' => 'Metadata\\Cache\\FileCache',
            'jms_di_extra.metadata.converter.class' => 'JMS\\DiExtraBundle\\Metadata\\MetadataConverter',
            'jms_di_extra.controller_resolver.class' => 'JMS\\DiExtraBundle\\HttpKernel\\ControllerResolver',
            'jms_di_extra.controller_injectors_warmer.class' => 'JMS\\DiExtraBundle\\HttpKernel\\ControllerInjectorsWarmer',
            'jms_di_extra.all_bundles' => false,
            'jms_di_extra.bundles' => array(
                0 => 'GdrGameBundle',
                1 => 'GdrMeteoBundle',
            ),
            'jms_di_extra.directories' => array(
                0 => ($this->targetDirs[2].'/../src'),
            ),
            'jms_di_extra.cache_dir' => (__DIR__.'/jms_diextra'),
            'jms_di_extra.disable_grep' => false,
            'jms_di_extra.doctrine_integration' => true,
            'jms_di_extra.cache_warmer.controller_file_blacklist' => array(
            ),
            'jms_di_extra.doctrine_integration.entity_manager.file' => (__DIR__.'/jms_diextra/doctrine/EntityManager_593ab854cafdb.php'),
            'jms_di_extra.doctrine_integration.entity_manager.class' => 'EntityManager593ab854cafdb_546a8d27f194334ee012bfe64f629947b07e4919\\__CG__\\Doctrine\\ORM\\EntityManager',
            'security.secured_services' => array(
            ),
            'security.access.method_interceptor.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Interception\\MethodSecurityInterceptor',
            'security.access.method_access_control' => array(
            ),
            'security.access.remembering_access_decision_manager.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\RememberingAccessDecisionManager',
            'security.access.run_as_manager.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\RunAsManager',
            'security.authentication.provider.run_as.class' => 'JMS\\SecurityExtraBundle\\Security\\Authentication\\Provider\\RunAsAuthenticationProvider',
            'security.run_as.key' => 'RunAsToken',
            'security.run_as.role_prefix' => 'ROLE_',
            'security.access.after_invocation_manager.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\AfterInvocation\\AfterInvocationManager',
            'security.access.after_invocation.acl_provider.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\AfterInvocation\\AclAfterInvocationProvider',
            'security.access.iddqd_voter.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Voter\\IddqdVoter',
            'security.extra.metadata_factory.class' => 'Metadata\\MetadataFactory',
            'security.extra.lazy_loading_driver.class' => 'Metadata\\Driver\\LazyLoadingDriver',
            'security.extra.driver_chain.class' => 'Metadata\\Driver\\DriverChain',
            'security.extra.annotation_driver.class' => 'JMS\\SecurityExtraBundle\\Metadata\\Driver\\AnnotationDriver',
            'security.extra.file_cache.class' => 'Metadata\\Cache\\FileCache',
            'security.access.secure_all_services' => false,
            'security.extra.cache_dir' => (__DIR__.'/jms_security'),
            'security.acl.permission_evaluator.class' => 'JMS\\SecurityExtraBundle\\Security\\Acl\\Expression\\PermissionEvaluator',
            'security.acl.has_permission_compiler.class' => 'JMS\\SecurityExtraBundle\\Security\\Acl\\Expression\\HasPermissionFunctionCompiler',
            'security.acl.has_class_permission_compiler.class' => 'JMS\\SecurityExtraBundle\\Security\\Acl\\Expression\\HasClassPermissionFunctionCompiler',
            'security.expressions.voter.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\LazyLoadingExpressionVoter',
            'security.expressions.handler.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\ContainerAwareExpressionHandler',
            'security.expressions.compiler.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\ExpressionCompiler',
            'security.expressions.expression.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\Expression',
            'security.expressions.variable_compiler.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\Compiler\\ContainerAwareVariableCompiler',
            'security.expressions.parameter_compiler.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\Compiler\\ParameterExpressionCompiler',
            'security.expressions.reverse_interpreter.class' => 'JMS\\SecurityExtraBundle\\Security\\Authorization\\Expression\\ReverseInterpreter',
            'security.extra.config_driver.class' => 'JMS\\SecurityExtraBundle\\Metadata\\Driver\\ConfigDriver',
            'security.extra.twig_extension.class' => 'JMS\\SecurityExtraBundle\\Twig\\SecurityExtension',
            'security.authenticated_voter.disabled' => false,
            'security.role_voter.disabled' => false,
            'security.acl_voter.disabled' => false,
            'security.extra.iddqd_ignore_roles' => array(
                0 => 'ROLE_PREVIOUS_ADMIN',
            ),
            'security.iddqd_aliases' => array(
            ),
            'stof_doctrine_extensions.event_listener.locale.class' => 'Stof\\DoctrineExtensionsBundle\\EventListener\\LocaleListener',
            'stof_doctrine_extensions.event_listener.logger.class' => 'Stof\\DoctrineExtensionsBundle\\EventListener\\LoggerListener',
            'stof_doctrine_extensions.event_listener.blame.class' => 'Stof\\DoctrineExtensionsBundle\\EventListener\\BlameListener',
            'stof_doctrine_extensions.uploadable.manager.class' => 'Stof\\DoctrineExtensionsBundle\\Uploadable\\UploadableManager',
            'stof_doctrine_extensions.uploadable.mime_type_guesser.class' => 'Stof\\DoctrineExtensionsBundle\\Uploadable\\MimeTypeGuesserAdapter',
            'stof_doctrine_extensions.uploadable.default_file_info.class' => 'Stof\\DoctrineExtensionsBundle\\Uploadable\\UploadedFileInfo',
            'stof_doctrine_extensions.default_locale' => 'it_IT',
            'stof_doctrine_extensions.default_file_path' => NULL,
            'stof_doctrine_extensions.translation_fallback' => false,
            'stof_doctrine_extensions.persist_default_translation' => false,
            'stof_doctrine_extensions.skip_translation_on_load' => false,
            'stof_doctrine_extensions.uploadable.validate_writable_directory' => true,
            'stof_doctrine_extensions.listener.translatable.class' => 'Gedmo\\Translatable\\TranslatableListener',
            'stof_doctrine_extensions.listener.timestampable.class' => 'Gedmo\\Timestampable\\TimestampableListener',
            'stof_doctrine_extensions.listener.blameable.class' => 'Gedmo\\Blameable\\BlameableListener',
            'stof_doctrine_extensions.listener.sluggable.class' => 'Gedmo\\Sluggable\\SluggableListener',
            'stof_doctrine_extensions.listener.tree.class' => 'Gedmo\\Tree\\TreeListener',
            'stof_doctrine_extensions.listener.loggable.class' => 'Gedmo\\Loggable\\LoggableListener',
            'stof_doctrine_extensions.listener.sortable.class' => 'Gedmo\\Sortable\\SortableListener',
            'stof_doctrine_extensions.listener.softdeleteable.class' => 'Gedmo\\SoftDeleteable\\SoftDeleteableListener',
            'stof_doctrine_extensions.listener.uploadable.class' => 'Gedmo\\Uploadable\\UploadableListener',
            'stof_doctrine_extensions.listener.reference_integrity.class' => 'Gedmo\\ReferenceIntegrity\\ReferenceIntegrityListener',
            'ivory_ck_editor.helper.assets_version_trimer.class' => 'Ivory\\CKEditorBundle\\Helper\\AssetsVersionTrimerHelper',
            'ivory_ck_editor.helper.templating.class' => 'Ivory\\CKEditorBundle\\Helper\\CKEditorHelper',
            'ivory_ck_editor.form.type.class' => 'Ivory\\CKEditorBundle\\Form\\Type\\CKEditorType',
            'ivory_ck_editor.config_manager.class' => 'Ivory\\CKEditorBundle\\Model\\ConfigManager',
            'ivory_ck_editor.plugin_manager.class' => 'Ivory\\CKEditorBundle\\Model\\PluginManager',
            'ivory_ck_editor.styles_set_manager.class' => 'Ivory\\CKEditorBundle\\Model\\StylesSetManager',
            'ivory_ck_editor.template_manager.class' => 'Ivory\\CKEditorBundle\\Model\\TemplateManager',
            'ivory_ck_editor.twig_extension.class' => 'Ivory\\CKEditorBundle\\Twig\\CKEditorExtension',
            'ivory_ck_editor.form.type.enable' => true,
            'ivory_ck_editor.form.type.base_path' => 'bundles/ivoryckeditor/',
            'ivory_ck_editor.form.type.js_path' => 'bundles/ivoryckeditor/ckeditor.js',
            'fos_js_routing.extractor.class' => 'FOS\\JsRoutingBundle\\Extractor\\ExposedRoutesExtractor',
            'fos_js_routing.controller.class' => 'FOS\\JsRoutingBundle\\Controller\\Controller',
            'fos_js_routing.cache_control' => array(
                'enabled' => false,
            ),
            'vich_uploader.default_filename_attribute_suffix' => '_name',
            'vich_uploader.mappings' => array(
                'item_image' => array(
                    'uri_prefix' => '/uploads/items',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/items'),
                    'namer' => 'vich_uploader.namer_uniqid',
                    'inject_on_load' => true,
                    'delete_on_update' => true,
                    'delete_on_remove' => true,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'item_type' => array(
                    'uri_prefix' => '/uploads/itemsType',
                    'upload_destination' => ($this->targetDirs[2].'/../web/uploads/itemsType'),
                    'namer' => 'vich_uploader.namer_uniqid',
                    'inject_on_load' => true,
                    'delete_on_update' => true,
                    'delete_on_remove' => true,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'item_big_image' => array(
                    'uri_prefix' => '/uploads/items',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/items'),
                    'namer' => 'vich_uploader.namer_uniqid',
                    'inject_on_load' => true,
                    'delete_on_update' => true,
                    'delete_on_remove' => true,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'item_icon_dress_image' => array(
                    'uri_prefix' => '/uploads/items',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/items'),
                    'namer' => 'vich_uploader.namer_uniqid',
                    'inject_on_load' => true,
                    'delete_on_update' => false,
                    'delete_on_remove' => false,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'race_icon_male' => array(
                    'uri_prefix' => '/uploads/race',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/race'),
                    'namer' => 'vich_uploader.namer_uniqid',
                    'inject_on_load' => true,
                    'delete_on_update' => false,
                    'directory_namer' => NULL,
                    'delete_on_remove' => true,
                    'db_driver' => 'orm',
                ),
                'race_icon_female' => array(
                    'uri_prefix' => '/uploads/race',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/race'),
                    'namer' => 'vich_uploader.namer_uniqid',
                    'inject_on_load' => true,
                    'delete_on_update' => false,
                    'delete_on_remove' => false,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'race_default_image' => array(
                    'uri_prefix' => '/uploads/race',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/race'),
                    'namer' => 'vich_uploader.namer_uniqid',
                    'inject_on_load' => true,
                    'delete_on_update' => false,
                    'delete_on_remove' => false,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'race_big_image' => array(
                    'uri_prefix' => '/uploads/race',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/race'),
                    'namer' => 'vich_uploader.namer_uniqid',
                    'inject_on_load' => true,
                    'delete_on_update' => true,
                    'delete_on_remove' => true,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'enclave_upload' => array(
                    'uri_prefix' => '/uploads/enclave',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/enclave'),
                    'namer' => 'vich_uploader.namer_uniqid',
                    'inject_on_load' => true,
                    'delete_on_update' => false,
                    'delete_on_remove' => false,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'avatar_image' => array(
                    'uri_prefix' => '/uploads/avatar',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/avatar'),
                    'namer' => 'vich_uploader.namer_uniqid',
                    'inject_on_load' => true,
                    'delete_on_update' => true,
                    'delete_on_remove' => true,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'skill_image' => array(
                    'uri_prefix' => '/uploads/skill',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/skill'),
                    'namer' => 'vich_uploader.namer_uniqid',
                    'inject_on_load' => true,
                    'delete_on_update' => true,
                    'delete_on_remove' => true,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'general_upload' => array(
                    'uri_prefix' => '/uploads/general',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/general'),
                    'namer' => 'vich_uploader.namer_uniqid',
                    'inject_on_load' => true,
                    'delete_on_update' => false,
                    'delete_on_remove' => false,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'meteo_image' => array(
                    'uri_prefix' => '/uploads/meteo',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/meteo'),
                    'namer' => 'vich_uploader.namer_origname',
                    'inject_on_load' => true,
                    'delete_on_update' => false,
                    'delete_on_remove' => false,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'book_image' => array(
                    'uri_prefix' => '/uploads/book',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/book'),
                    'namer' => 'vich_uploader.namer_origname',
                    'inject_on_load' => true,
                    'delete_on_update' => false,
                    'delete_on_remove' => false,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'moon_image' => array(
                    'uri_prefix' => '/uploads/book',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/book'),
                    'namer' => 'vich_uploader.namer_origname',
                    'inject_on_load' => true,
                    'delete_on_update' => false,
                    'delete_on_remove' => false,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'location_image' => array(
                    'uri_prefix' => '/uploads/location',
                    'upload_destination' => ($this->targetDirs[2].'/../web//uploads/location'),
                    'namer' => 'vich_uploader.namer_origname',
                    'inject_on_load' => true,
                    'delete_on_update' => false,
                    'delete_on_remove' => false,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
                'achievement_image' => array(
                    'uri_prefix' => '/uploads/achievement',
                    'upload_destination' => ($this->targetDirs[2].'/../web/uploads/achievement'),
                    'namer' => 'vich_uploader.namer_origname',
                    'inject_on_load' => true,
                    'delete_on_update' => true,
                    'delete_on_remove' => true,
                    'directory_namer' => NULL,
                    'db_driver' => 'orm',
                ),
            ),
            'vich_uploader.file_injector.class' => 'Vich\\UploaderBundle\\Injector\\FileInjector',
            'jms_serializer.metadata.file_locator.class' => 'Metadata\\Driver\\FileLocator',
            'jms_serializer.metadata.annotation_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\AnnotationDriver',
            'jms_serializer.metadata.chain_driver.class' => 'Metadata\\Driver\\DriverChain',
            'jms_serializer.metadata.yaml_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\YamlDriver',
            'jms_serializer.metadata.xml_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\XmlDriver',
            'jms_serializer.metadata.php_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\PhpDriver',
            'jms_serializer.metadata.doctrine_type_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\DoctrineTypeDriver',
            'jms_serializer.metadata.doctrine_phpcr_type_driver.class' => 'JMS\\Serializer\\Metadata\\Driver\\DoctrinePHPCRTypeDriver',
            'jms_serializer.metadata.lazy_loading_driver.class' => 'Metadata\\Driver\\LazyLoadingDriver',
            'jms_serializer.metadata.metadata_factory.class' => 'Metadata\\MetadataFactory',
            'jms_serializer.metadata.cache.file_cache.class' => 'Metadata\\Cache\\FileCache',
            'jms_serializer.event_dispatcher.class' => 'JMS\\Serializer\\EventDispatcher\\LazyEventDispatcher',
            'jms_serializer.camel_case_naming_strategy.class' => 'JMS\\Serializer\\Naming\\CamelCaseNamingStrategy',
            'jms_serializer.serialized_name_annotation_strategy.class' => 'JMS\\Serializer\\Naming\\SerializedNameAnnotationStrategy',
            'jms_serializer.cache_naming_strategy.class' => 'JMS\\Serializer\\Naming\\CacheNamingStrategy',
            'jms_serializer.doctrine_object_constructor.class' => 'JMS\\Serializer\\Construction\\DoctrineObjectConstructor',
            'jms_serializer.unserialize_object_constructor.class' => 'JMS\\Serializer\\Construction\\UnserializeObjectConstructor',
            'jms_serializer.version_exclusion_strategy.class' => 'JMS\\Serializer\\Exclusion\\VersionExclusionStrategy',
            'jms_serializer.serializer.class' => 'JMS\\Serializer\\Serializer',
            'jms_serializer.twig_extension.class' => 'JMS\\Serializer\\Twig\\SerializerExtension',
            'jms_serializer.templating.helper.class' => 'JMS\\SerializerBundle\\Templating\\SerializerHelper',
            'jms_serializer.json_serialization_visitor.class' => 'JMS\\Serializer\\JsonSerializationVisitor',
            'jms_serializer.json_serialization_visitor.options' => 0,
            'jms_serializer.json_deserialization_visitor.class' => 'JMS\\Serializer\\JsonDeserializationVisitor',
            'jms_serializer.xml_serialization_visitor.class' => 'JMS\\Serializer\\XmlSerializationVisitor',
            'jms_serializer.xml_deserialization_visitor.class' => 'JMS\\Serializer\\XmlDeserializationVisitor',
            'jms_serializer.xml_deserialization_visitor.doctype_whitelist' => array(
            ),
            'jms_serializer.yaml_serialization_visitor.class' => 'JMS\\Serializer\\YamlSerializationVisitor',
            'jms_serializer.handler_registry.class' => 'JMS\\Serializer\\Handler\\LazyHandlerRegistry',
            'jms_serializer.datetime_handler.class' => 'JMS\\Serializer\\Handler\\DateHandler',
            'jms_serializer.array_collection_handler.class' => 'JMS\\Serializer\\Handler\\ArrayCollectionHandler',
            'jms_serializer.php_collection_handler.class' => 'JMS\\Serializer\\Handler\\PhpCollectionHandler',
            'jms_serializer.form_error_handler.class' => 'JMS\\Serializer\\Handler\\FormErrorHandler',
            'jms_serializer.constraint_violation_handler.class' => 'JMS\\Serializer\\Handler\\ConstraintViolationHandler',
            'jms_serializer.doctrine_proxy_subscriber.class' => 'JMS\\Serializer\\EventDispatcher\\Subscriber\\DoctrineProxySubscriber',
            'jms_serializer.stopwatch_subscriber.class' => 'JMS\\SerializerBundle\\Serializer\\StopwatchEventSubscriber',
            'exercise_html_purifier.class' => 'HTMLPurifier',
            'exercise_html_purifier.config.class' => 'HTMLPurifier_Config',
            'exercise_html_purifier.cache_warmer.serializer.class' => 'Exercise\\HTMLPurifierBundle\\CacheWarmer\\SerializerCacheWarmer',
            'exercise_html_purifier.twig_extension.class' => 'Exercise\\HTMLPurifierBundle\\Twig\\HTMLPurifierExtension',
            'exercise_html_purifier.cache_warmer.serializer.paths' => array(
                0 => (__DIR__.'/htmlpurifier'),
            ),
            'simple_html_dom.class' => 'simple_html_dom',
            'knp_paginator.class' => 'Knp\\Component\\Pager\\Paginator',
            'knp_paginator.helper.processor.class' => 'Knp\\Bundle\\PaginatorBundle\\Helper\\Processor',
            'knp_paginator.template.pagination' => 'GdrGameBundle:Default:paginator.html.twig',
            'knp_paginator.template.filtration' => 'KnpPaginatorBundle:Pagination:filtration.html.twig',
            'knp_paginator.template.sortable' => 'KnpPaginatorBundle:Pagination:sortable_link.html.twig',
            'knp_paginator.page_range' => 5,
            'console.command.ids' => array(
            ),
        );
    }
}
