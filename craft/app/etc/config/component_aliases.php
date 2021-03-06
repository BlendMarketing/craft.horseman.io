<?php

return array(
	'app.assetsourcetypes.BaseAssetSourceType',
	'app.assetsourcetypes.GoogleCloudAssetSourceType',
	'app.assetsourcetypes.LocalAssetSourceType',
	'app.assetsourcetypes.RackspaceAssetSourceType',
	'app.assetsourcetypes.S3AssetSourceType',
	'app.assetsourcetypes.TempAssetSourceType',
	'app.consolecommands.BaseCommand',
	'app.consolecommands.MigrateCommand',
	'app.consolecommands.QuerygenCommand',
	'app.controllers.AppController',
	'app.controllers.AssetSourcesController',
	'app.controllers.AssetTransformsController',
	'app.controllers.AssetsController',
	'app.controllers.BaseController',
	'app.controllers.BaseElementsController',
	'app.controllers.BaseEntriesController',
	'app.controllers.CategoriesController',
	'app.controllers.ChartsController',
	'app.controllers.DashboardController',
	'app.controllers.ElementIndexController',
	'app.controllers.ElementIndexSettingsController',
	'app.controllers.ElementsController',
	'app.controllers.EmailMessagesController',
	'app.controllers.EntriesController',
	'app.controllers.EntryRevisionsController',
	'app.controllers.FieldsController',
	'app.controllers.GlobalsController',
	'app.controllers.InstallController',
	'app.controllers.LocalizationController',
	'app.controllers.PluginsController',
	'app.controllers.RebrandController',
	'app.controllers.RoutesController',
	'app.controllers.SectionsController',
	'app.controllers.StructuresController',
	'app.controllers.SystemSettingsController',
	'app.controllers.TagsController',
	'app.controllers.TasksController',
	'app.controllers.TemplatesController',
	'app.controllers.ToolsController',
	'app.controllers.UpdateController',
	'app.controllers.UserSettingsController',
	'app.controllers.UsersController',
	'app.controllers.UtilsController',
	'app.elementactions.BaseElementAction',
	'app.elementactions.CopyReferenceTagElementAction',
	'app.elementactions.DeleteAssetsElementAction',
	'app.elementactions.DeleteElementAction',
	'app.elementactions.DeleteUsersElementAction',
	'app.elementactions.DownloadFileElementAction',
	'app.elementactions.EditElementAction',
	'app.elementactions.IElementAction',
	'app.elementactions.NewChildElementAction',
	'app.elementactions.RenameFileElementAction',
	'app.elementactions.ReplaceFileElementAction',
	'app.elementactions.SetStatusElementAction',
	'app.elementactions.SuspendUsersElementAction',
	'app.elementactions.UnsuspendUsersElementAction',
	'app.elementactions.ViewElementAction',
	'app.elementtypes.AssetElementType',
	'app.elementtypes.BaseElementType',
	'app.elementtypes.CategoryElementType',
	'app.elementtypes.EntryElementType',
	'app.elementtypes.GlobalSetElementType',
	'app.elementtypes.IElementType',
	'app.elementtypes.MatrixBlockElementType',
	'app.elementtypes.TagElementType',
	'app.elementtypes.UserElementType',
	'app.enums.AssetConflictResolution',
	'app.enums.AttributeType',
	'app.enums.BaseEnum',
	'app.enums.CacheMethod',
	'app.enums.ColumnType',
	'app.enums.ComponentType',
	'app.enums.ConfigFile',
	'app.enums.CraftPackage',
	'app.enums.ElementType',
	'app.enums.EmailerType',
	'app.enums.InstallStatus',
	'app.enums.InvalidLoginMode',
	'app.enums.LicenseKeyStatus',
	'app.enums.LogLevel',
	'app.enums.PatchManifestFileAction',
	'app.enums.PeriodType',
	'app.enums.PluginUpdateStatus',
	'app.enums.RequirementResult',
	'app.enums.SectionType',
	'app.enums.TaskStatus',
	'app.enums.TemplateMode',
	'app.enums.UserStatus',
	'app.enums.VersionUpdateStatus',
	'app.etc.behaviors.AppBehavior',
	'app.etc.behaviors.BaseBehavior',
	'app.etc.behaviors.FieldLayoutBehavior',
	'app.etc.cache.ApcCache',
	'app.etc.cache.DbCache',
	'app.etc.cache.EAcceleratorCache',
	'app.etc.cache.FileCache',
	'app.etc.cache.MemCache',
	'app.etc.cache.RedisCache',
	'app.etc.cache.WinCache',
	'app.etc.cache.XCache',
	'app.etc.cache.ZendDataCache',
	'app.etc.cache.dependencies.AppPathCacheDependency',
	'app.etc.components.BaseApplicationComponent',
	'app.etc.components.BaseComponentType',
	'app.etc.components.BaseSavableComponentType',
	'app.etc.components.IComponentType',
	'app.etc.components.ISavableComponentType',
	'app.etc.console.ConsoleCommandRunner',
	'app.etc.dates.DateFormatter',
	'app.etc.dates.DateInterval',
	'app.etc.dates.DateTime',
	'app.etc.db.BaseMigration',
	'app.etc.db.DbBackup',
	'app.etc.db.DbCommand',
	'app.etc.db.DbConnection',
	'app.etc.db.schemas.MysqlSchema',
	'app.etc.elements.ElementRelationParamParser',
	'app.etc.errors.DbConnectException',
	'app.etc.errors.EmailTestException',
	'app.etc.errors.ErrorException',
	'app.etc.errors.ErrorHandler',
	'app.etc.errors.EtException',
	'app.etc.errors.Exception',
	'app.etc.errors.HttpException',
	'app.etc.errors.InvalidSourceException',
	'app.etc.errors.InvalidSubpathException',
	'app.etc.errors.InvlaidLicenseKeyException',
	'app.etc.errors.TemplateLoaderException',
	'app.etc.et.Et',
	'app.etc.events.ElementActionEvent',
	'app.etc.events.Event',
	'app.etc.i18n.LocaleData',
	'app.etc.i18n.NumberFormatter',
	'app.etc.i18n.PhpMessageSource',
	'app.etc.image.BaseImage',
	'app.etc.image.Image',
	'app.etc.image.SvgImage',
	'app.etc.io.BaseIO',
	'app.etc.io.File',
	'app.etc.io.Folder',
	'app.etc.io.IZip',
	'app.etc.io.PclZip',
	'app.etc.io.Zip',
	'app.etc.io.ZipArchive',
	'app.etc.logging.FileLogRoute',
	'app.etc.logging.LogFilter',
	'app.etc.logging.LogRouter',
	'app.etc.logging.Logger',
	'app.etc.logging.ProfileLogRoute',
	'app.etc.logging.WebLogRoute',
	'app.etc.plugins.BasePlugin',
	'app.etc.plugins.IPlugin',
	'app.etc.requirements.Requirements',
	'app.etc.requirements.RequirementsChecker',
	'app.etc.search.SearchQuery',
	'app.etc.search.SearchQueryTerm',
	'app.etc.search.SearchQueryTermGroup',
	'app.etc.state.StatePersister',
	'app.etc.templating.BaseTemplate',
	'app.etc.templating.StringTemplate',
	'app.etc.templating.TwigEnvironment',
	'app.etc.templating.TwigParser',
	'app.etc.templating.twigextensions.Cache_Node',
	'app.etc.templating.twigextensions.Cache_TokenParser',
	'app.etc.templating.twigextensions.CraftTwigExtension',
	'app.etc.templating.twigextensions.DeprecatedTag_TokenParser',
	'app.etc.templating.twigextensions.Exit_Node',
	'app.etc.templating.twigextensions.Exit_TokenParser',
	'app.etc.templating.twigextensions.Header_Node',
	'app.etc.templating.twigextensions.Header_TokenParser',
	'app.etc.templating.twigextensions.Hook_Node',
	'app.etc.templating.twigextensions.Hook_TokenParser',
	'app.etc.templating.twigextensions.IncludeResource_Node',
	'app.etc.templating.twigextensions.IncludeResource_TokenParser',
	'app.etc.templating.twigextensions.IncludeTranslations_Node',
	'app.etc.templating.twigextensions.IncludeTranslations_TokenParser',
	'app.etc.templating.twigextensions.Namespace_Node',
	'app.etc.templating.twigextensions.Namespace_TokenParser',
	'app.etc.templating.twigextensions.NavItem_Node',
	'app.etc.templating.twigextensions.Nav_Node',
	'app.etc.templating.twigextensions.Nav_TokenParser',
	'app.etc.templating.twigextensions.Paginate_Node',
	'app.etc.templating.twigextensions.Paginate_TokenParser',
	'app.etc.templating.twigextensions.Redirect_Node',
	'app.etc.templating.twigextensions.Redirect_TokenParser',
	'app.etc.templating.twigextensions.RequireAdmin_Node',
	'app.etc.templating.twigextensions.RequireAdmin_TokenParser',
	'app.etc.templating.twigextensions.RequireEdition_Node',
	'app.etc.templating.twigextensions.RequireEdition_TokenParser',
	'app.etc.templating.twigextensions.RequireLogin_Node',
	'app.etc.templating.twigextensions.RequireLogin_TokenParser',
	'app.etc.templating.twigextensions.RequirePermission_Node',
	'app.etc.templating.twigextensions.RequirePermission_TokenParser',
	'app.etc.templating.twigextensions.Switch_Node',
	'app.etc.templating.twigextensions.Switch_TokenParser',
	'app.etc.templating.twigextensions.TemplateLoader',
	'app.etc.updates.Updater',
	'app.etc.users.UserIdentity',
	'app.etc.web.CookieCollection',
	'app.etc.web.HttpCookie',
	'app.etc.web.UploadedFile',
	'app.etc.web.UrlManager',
	'app.extensions.NestedSetBehavior',
	'app.fieldtypes.AssetsFieldType',
	'app.fieldtypes.BaseElementFieldType',
	'app.fieldtypes.BaseFieldType',
	'app.fieldtypes.BaseOptionsFieldType',
	'app.fieldtypes.CategoriesFieldType',
	'app.fieldtypes.CheckboxesFieldType',
	'app.fieldtypes.ColorFieldType',
	'app.fieldtypes.DateFieldType',
	'app.fieldtypes.DropdownFieldType',
	'app.fieldtypes.EntriesFieldType',
	'app.fieldtypes.IEagerLoadingFieldType',
	'app.fieldtypes.IFieldType',
	'app.fieldtypes.IPreviewableFieldType',
	'app.fieldtypes.LightswitchFieldType',
	'app.fieldtypes.MatrixFieldType',
	'app.fieldtypes.MultiOptionsFieldData',
	'app.fieldtypes.MultiSelectFieldType',
	'app.fieldtypes.NumberFieldType',
	'app.fieldtypes.OptionData',
	'app.fieldtypes.PlainTextFieldType',
	'app.fieldtypes.PositionSelectFieldType',
	'app.fieldtypes.RadioButtonsFieldType',
	'app.fieldtypes.RichTextData',
	'app.fieldtypes.RichTextFieldType',
	'app.fieldtypes.SingleOptionFieldData',
	'app.fieldtypes.TableFieldType',
	'app.fieldtypes.TagsFieldType',
	'app.fieldtypes.UsersFieldType',
	'app.helpers.AppHelper',
	'app.helpers.ArrayHelper',
	'app.helpers.AssetsHelper',
	'app.helpers.ChartHelper',
	'app.helpers.CpHelper',
	'app.helpers.DateTimeHelper',
	'app.helpers.DbHelper',
	'app.helpers.ElementHelper',
	'app.helpers.FileHelper',
	'app.helpers.HeaderHelper',
	'app.helpers.HtmlHelper',
	'app.helpers.IOHelper',
	'app.helpers.ImageHelper',
	'app.helpers.JsonHelper',
	'app.helpers.LocalizationHelper',
	'app.helpers.LoggingHelper',
	'app.helpers.MigrationHelper',
	'app.helpers.ModelHelper',
	'app.helpers.NumberHelper',
	'app.helpers.PathHelper',
	'app.helpers.StringHelper',
	'app.helpers.TemplateHelper',
	'app.helpers.UpdateHelper',
	'app.helpers.UrlHelper',
	'app.helpers.VariableHelper',
	'app.models.AccountSettingsModel',
	'app.models.AppNewReleaseModel',
	'app.models.AppUpdateModel',
	'app.models.AssetFileModel',
	'app.models.AssetFolderModel',
	'app.models.AssetIndexDataModel',
	'app.models.AssetOperationResponseModel',
	'app.models.AssetSourceModel',
	'app.models.AssetTransformIndexModel',
	'app.models.AssetTransformModel',
	'app.models.BaseComponentModel',
	'app.models.BaseElementModel',
	'app.models.BaseEntryRevisionModel',
	'app.models.BaseModel',
	'app.models.CategoryGroupLocaleModel',
	'app.models.CategoryGroupModel',
	'app.models.CategoryModel',
	'app.models.ContentModel',
	'app.models.DeprecationErrorModel',
	'app.models.ElementCriteriaModel',
	'app.models.EmailModel',
	'app.models.EmailSettingsModel',
	'app.models.EntryDraftModel',
	'app.models.EntryModel',
	'app.models.EntryTypeModel',
	'app.models.EntryVersionModel',
	'app.models.EtModel',
	'app.models.FieldGroupModel',
	'app.models.FieldLayoutFieldModel',
	'app.models.FieldLayoutModel',
	'app.models.FieldLayoutTabModel',
	'app.models.FieldModel',
	'app.models.FolderCriteriaModel',
	'app.models.GetHelpModel',
	'app.models.GlobalSetModel',
	'app.models.InfoModel',
	'app.models.LocaleModel',
	'app.models.LogEntryModel',
	'app.models.MatrixBlockModel',
	'app.models.MatrixBlockTypeModel',
	'app.models.MatrixSettingsModel',
	'app.models.Model',
	'app.models.NumberFieldTypeSettingsModel',
	'app.models.PasswordModel',
	'app.models.PluginNewReleaseModel',
	'app.models.PluginUpdateModel',
	'app.models.RebrandEmailModel',
	'app.models.SectionLocaleModel',
	'app.models.SectionModel',
	'app.models.SiteSettingsModel',
	'app.models.StructureModel',
	'app.models.TagGroupModel',
	'app.models.TagModel',
	'app.models.TaskModel',
	'app.models.UpdateModel',
	'app.models.UpgradeInfoModel',
	'app.models.UpgradePurchaseModel',
	'app.models.UrlModel',
	'app.models.UserGroupModel',
	'app.models.UserModel',
	'app.models.UsernameModel',
	'app.models.WidgetModel',
	'app.records.AssetFileRecord',
	'app.records.AssetFolderRecord',
	'app.records.AssetIndexDataRecord',
	'app.records.AssetSourceRecord',
	'app.records.AssetTransformRecord',
	'app.records.BaseRecord',
	'app.records.CategoryGroupLocaleRecord',
	'app.records.CategoryGroupRecord',
	'app.records.CategoryRecord',
	'app.records.ElementIndexSettingsRecord',
	'app.records.ElementLocaleRecord',
	'app.records.ElementRecord',
	'app.records.EmailMessageRecord',
	'app.records.EntryDraftRecord',
	'app.records.EntryRecord',
	'app.records.EntryTypeRecord',
	'app.records.EntryVersionRecord',
	'app.records.FieldGroupRecord',
	'app.records.FieldLayoutFieldRecord',
	'app.records.FieldLayoutRecord',
	'app.records.FieldLayoutTabRecord',
	'app.records.FieldRecord',
	'app.records.GlobalSetRecord',
	'app.records.LocaleRecord',
	'app.records.MatrixBlockRecord',
	'app.records.MatrixBlockTypeRecord',
	'app.records.MigrationRecord',
	'app.records.PluginRecord',
	'app.records.RouteRecord',
	'app.records.SectionLocaleRecord',
	'app.records.SectionRecord',
	'app.records.SessionRecord',
	'app.records.StructureElementRecord',
	'app.records.StructureRecord',
	'app.records.SystemSettingsRecord',
	'app.records.TagGroupRecord',
	'app.records.TagRecord',
	'app.records.TaskRecord',
	'app.records.TokenRecord',
	'app.records.UserGroupRecord',
	'app.records.UserGroup_UserRecord',
	'app.records.UserPermissionRecord',
	'app.records.UserPermission_UserGroupRecord',
	'app.records.UserPermission_UserRecord',
	'app.records.UserRecord',
	'app.records.WidgetRecord',
	'app.services.AssetIndexingService',
	'app.services.AssetSourcesService',
	'app.services.AssetTransformsService',
	'app.services.AssetsService',
	'app.services.CacheService',
	'app.services.CategoriesService',
	'app.services.ComponentsService',
	'app.services.ConfigService',
	'app.services.ContentService',
	'app.services.DashboardService',
	'app.services.DeprecatorService',
	'app.services.ElementIndexesService',
	'app.services.ElementsService',
	'app.services.EmailMessagesService',
	'app.services.EmailService',
	'app.services.EntriesService',
	'app.services.EntryRevisionsService',
	'app.services.EtService',
	'app.services.FeedsService',
	'app.services.FieldsService',
	'app.services.GlobalsService',
	'app.services.HttpRequestService',
	'app.services.HttpSessionService',
	'app.services.ImagesService',
	'app.services.InstallService',
	'app.services.LocalizationService',
	'app.services.MatrixService',
	'app.services.MigrationsService',
	'app.services.PathService',
	'app.services.PluginsService',
	'app.services.RelationsService',
	'app.services.ResourcesService',
	'app.services.RoutesService',
	'app.services.SearchService',
	'app.services.SectionsService',
	'app.services.SecurityService',
	'app.services.StructuresService',
	'app.services.SystemSettingsService',
	'app.services.TagsService',
	'app.services.TasksService',
	'app.services.TemplateCacheService',
	'app.services.TemplatesService',
	'app.services.TokensService',
	'app.services.UpdatesService',
	'app.services.UserGroupsService',
	'app.services.UserPermissionsService',
	'app.services.UserSessionService',
	'app.services.UsersService',
	'app.tasks.BaseTask',
	'app.tasks.DeleteStaleTemplateCachesTask',
	'app.tasks.FindAndReplaceTask',
	'app.tasks.GeneratePendingTransformsTask',
	'app.tasks.ITask',
	'app.tasks.LocalizeRelationsTask',
	'app.tasks.ResaveAllElementsTask',
	'app.tasks.ResaveElementsTask',
	'app.tasks.UpdateElementSlugsAndUrisTask',
	'app.tests.BaseTest',
	'app.tests.TestApplication',
	'app.tests.helpers.StubHelper',
	'app.tests.unit.AppBehaviorTest',
	'app.tests.unit.ArrayHelperTest',
	'app.tests.unit.EntriesServiceTest',
	'app.tests.unit.EntryModelTest',
	'app.tests.unit.HttpRequestsServiceTest',
	'app.tests.unit.ModelTest',
	'app.tests.unit.PluginsTest',
	'app.tests.unit.RecentEntriesWidgetTest',
	'app.tests.unit.ResourceProcessorTest',
	'app.tests.unit.SectionModelTest',
	'app.tests.unit.StringHelperTest',
	'app.tests.unit.UrlHelperTest',
	'app.tools.AssetIndexTool',
	'app.tools.BaseTool',
	'app.tools.ClearCachesTool',
	'app.tools.DbBackupTool',
	'app.tools.FindAndReplaceTool',
	'app.tools.ITool',
	'app.tools.SearchIndexTool',
	'app.validators.CompositeUniqueValidator',
	'app.validators.DateTimeValidator',
	'app.validators.HandleValidator',
	'app.validators.LocaleValidator',
	'app.validators.UriValidator',
	'app.validators.UrlFormatValidator',
	'app.validators.UrlValidator',
	'app.variables.AppVariable',
	'app.variables.AssetSourceTypeVariable',
	'app.variables.BaseComponentTypeVariable',
	'app.variables.CategoryGroupsVariable',
	'app.variables.ConfigVariable',
	'app.variables.CpVariable',
	'app.variables.CraftVariable',
	'app.variables.DeprecatorVariable',
	'app.variables.ElementIndexesVariable',
	'app.variables.ElementTypeVariable',
	'app.variables.ElementsVariable',
	'app.variables.EmailMessagesVariable',
	'app.variables.EntryRevisionsVariable',
	'app.variables.FeedsVariable',
	'app.variables.FieldTypeVariable',
	'app.variables.FieldsVariable',
	'app.variables.GlobalsVariable',
	'app.variables.HttpRequestVariable',
	'app.variables.ImageVariable',
	'app.variables.LocalizationVariable',
	'app.variables.PaginateVariable',
	'app.variables.PluginVariable',
	'app.variables.PluginsVariable',
	'app.variables.RebrandVariable',
	'app.variables.RoutesVariable',
	'app.variables.SectionsVariable',
	'app.variables.SystemSettingsVariable',
	'app.variables.TasksVariable',
	'app.variables.ToolVariable',
	'app.variables.UpdatesVariable',
	'app.variables.UserGroupsVariable',
	'app.variables.UserPermissionsVariable',
	'app.variables.UserSessionVariable',
	'app.widgets.BaseWidget',
	'app.widgets.FeedWidget',
	'app.widgets.GetHelpWidget',
	'app.widgets.IWidget',
	'app.widgets.NewUsersWidget',
	'app.widgets.QuickPostWidget',
	'app.widgets.RecentEntriesWidget',
	'app.widgets.UpdatesWidget',
);
