@extends('layouts.minimal')

@section('title')
Setup
@endsection

@section('css')
<link rel='stylesheet' href='/css/default-bootstrap.min.css'>
<link rel='stylesheet' href='/css/setup.css'>
@endsection

@section('content')
<div class="navbar navbar-default navbar-fixed-top">
    <a class="navbar-brand" href="/">Polr</a>
</div>

<div class="row" ng-controller="SetupCtrl" class="ng-root">
    <div class='col-md-3'></div>

    <div class='col-md-6 setup-body well'>
        <div class='setup-center'>
            <img class='setup-logo' src='/img/logo.png'>
        </div>

        <form class='setup-form' method='POST' action='/setup'>
            <h4>数据库配置</h4>

            <p>数据库主机地址:</p>
            <input type='text' class='form-control' name='db:host' value='localhost'>

            <p>数据库主机端口:</p>
            <input type='text' class='form-control' name='db:port' value='3306'>

            <p>数据库用户名:</p>
            <input type='text' class='form-control' name='db:username' value='root'>

            <p>数据库用户密码:</p>
            <input type='password' class='form-control' name='db:password' value='password'>

            <p>
                数据库名:
                <setup-tooltip content="你必须手动创建属于Poly的数据库。"></setup-tooltip>
            </p>
            <input type='text' class='form-control' name='db:name' value='polr'>


            <h4>程序设置</h4>

            <p>网站名称:</p>
            <input type='text' class='form-control' name='app:name' value='Polr'>

            <p>网站协议:</p>
            <input type='text' class='form-control' name='app:protocol' value='http://'>

            <p>网站地址，例如你的域名（但不要包括http://或者结尾的斜杠）:</p>
            <input type='text' class='form-control' name='app:external_url' value='yoursite.com'>

            <p>
                高级统计:
                <button data-content="允许高级统计收集数据，如引用、地理位置和点击时间，启用高级统计功能会降低性能并增加磁盘空间的使用。"
                    type="button" class="btn btn-xs btn-default setup-qmark" data-toggle="popover">?</button>
            </p>
            <select name='setting:adv_analytics' class='form-control'>
                <option value='false' selected='selected'>关闭高级统计</option>
                <option value='true'>开启高级统计</option>
            </select>

            <p>短链接权限:</p>
            <select name='setting:shorten_permission' class='form-control'>
                <option value='false' selected='selected'>任何人都可以缩短链接</option>
                <option value='true'>只有登录的用户才可以缩短链接</option>
            </select>

            <p>公共接口:</p>
            <select name='setting:public_interface' class='form-control'>
                <option value='true' selected='selected'>显示公共接口(默认)</option>
                <option value='false'>重定向主页面到重定向链接</option>
            </select>

            <p>404页面和禁用短链接:</p>
            <select name='setting:redirect_404' class='form-control'>
                <option value='false' selected='selected'>显示错误信息（默认）</option>
                <option value='true'>重定向到链接</option>
            </select>

            <p>
                重定向链接:
                <setup-tooltip content="如果您希望将主页或404页面重定向到另一个网站，若要访问，则需要首先访问yoursite.com/login"></setup-tooltip>
            </p>
            <input type='text' class='form-control' name='setting:index_redirect' placeholder='http://your-main-site.com'>
            <p class='text-muted'>
                If a redirect is enabled, you will need to go to
                http://yoursite.com/login before you can access the index
                page.
            </p>

            <p>
                默认URL结尾类型:
                <setup-tooltip content="如果您选择使用伪随机字符串，您将无法选择使用基于数字的结尾。"></setup-tooltip>
            </p>
            <select name='setting:pseudor_ending' class='form-control'>
                <option value='false' selected='selected'>使用base64或base32(更短但可被预测，例如，5g)</option>
                <option value='true'>使用伪随机字符串(较长但不太可预测的字符串，例如 6lxz3j)</option>
            </select>

            <p>
                URL Ending Base:
                <setup-tooltip content="This will have no effect if you choose to use pseudorandom endings."></setup-tooltip>
            </p>
            <select name='setting:base' class='form-control'>
                <option value='32' selected='selected'>32 -- lowercase letters & numbers (default)</option>
                <option value='62'>62 -- lowercase, uppercase letters & numbers</option>
            </select>

            <h4>
                Admin Account Settings
                <setup-tooltip content="These credentials will be used for your admin account in Polr."></setup-tooltip>
            </h4>

            <p>Admin Username:</p>
            <input type='text' class='form-control' name='acct:username' value='polr'>

            <p>Admin Email:</p>
            <input type='text' class='form-control' name='acct:email' value='polr@admin.tld'>

            <p>Admin Password:</p>
            <input type='password' class='form-control' name='acct:password' value='polr'>

            <h4>
                SMTP Settings
                <setup-tooltip content="Required only if the email verification or password recovery features are enabled."></setup-tooltip>
            </h4>

            <p>SMTP Server:</p>
            <input type='text' class='form-control' name='app:smtp_server' placeholder='smtp.gmail.com'>

            <p>SMTP Port:</p>
            <input type='text' class='form-control' name='app:smtp_port' placeholder='25'>

            <p>SMTP Username:</p>
            <input type='text' class='form-control' name='app:smtp_username' placeholder='example@gmail.com'>

            <p>SMTP Password:</p>
            <input type='password' class='form-control' name='app:smtp_password' placeholder='password'>

            <p>SMTP From:</p>
            <input type='text' class='form-control' name='app:smtp_from' placeholder='example@gmail.com'>
            <p>SMTP From Name:</p>
            <input type='text' class='form-control' name='app:smtp_from_name' placeholder='noreply'>

            <h4>API Settings</h4>

            <p>Anonymous API:</p>
            <select name='setting:anon_api' class='form-control'>
                <option selected value='false'>Off -- only registered users can use API</option>
                <option value='true'>On -- empty key API requests are allowed</option>
            </select>

            <p>
                Anonymous API Quota:
                <setup-tooltip content="API quota for non-authenticated users per minute per IP."></setup-tooltip>
            </p>
            <input type='text' class='form-control' name='setting:anon_api_quota' placeholder='10'>

            <p>Automatic API Assignment:</p>
            <select name='setting:auto_api_key' class='form-control'>
                <option selected value='false'>Off -- admins must manually enable API for each user</option>
                <option value='true'>On -- each user receives an API key on signup</option>
            </select>

            <h4>Other Settings</h4>

            <p>
                Registration:
                <setup-tooltip content="Enabling registration allows any user to create an account."></setup-tooltip>
            </p>
            <select name='setting:registration_permission' class='form-control'>
                <option value='none'>Registration disabled</option>
                <option value='email'>Enabled, email verification required</option>
                <option value='no-verification'>Enabled, no email verification required</option>
            </select>

            <p>
                Restrict Registration Email Domains:
                <setup-tooltip content="Restrict registration to certain email domains."></setup-tooltip>
            </p>
            <select name='setting:restrict_email_domain' class='form-control'>
                <option value='false'>Allow any email domain to register</option>
                <option value='true'>Restrict email domains allowed to register</option>
            </select>

            <p>
                Permitted Email Domains:
                <setup-tooltip content="A comma-separated list of emails permitted to register."></setup-tooltip>
            </p>
            <input type='text' class='form-control' name='setting:allowed_email_domains' placeholder='company.com,company-corp.com'>

            <p>
                Password Recovery:
                <setup-tooltip content="Password recovery allows users to reset their password through email."></setup-tooltip>
            </p>
            <select name='setting:password_recovery' class='form-control'>
                <option value='false'>Password recovery disabled</option>
                <option value='true'>Password recovery enabled</option>
            </select>
            <p class='text-muted'>
                Please ensure SMTP is properly set up before enabling password recovery.
            </p>

            <p>
                Require reCAPTCHA for Registrations
                <setup-tooltip content="You must provide your reCAPTCHA keys to use this feature."></setup-tooltip>
            </p>
            <select name='setting:acct_registration_recaptcha' class='form-control'>
                <option value='false'>Do not require reCAPTCHA for registration</option>
                <option value='true'>Require reCATPCHA for registration</option>
            </select>

            <p>
                reCAPTCHA Configuration:
                <setup-tooltip content="You must provide reCAPTCHA keys if you intend to use any reCAPTCHA-dependent features."></setup-tooltip>
            </p>

            <p>
                reCAPTCHA Site Key
            </p>
            <input type='text' class='form-control' name='setting:recaptcha_site_key'>

            <p>
                reCAPTCHA Secret Key
            </p>
            <input type='text' class='form-control' name='setting:recaptcha_secret_key'>

            <p class='text-muted'>
                You can obtain reCAPTCHA keys from <a href="https://www.google.com/recaptcha/admin">Google's reCAPTCHA website</a>.
            </p>

            <p>Theme (<a href='https://github.com/cydrobolt/polr/wiki/Themes-Screenshots'>screenshots</a>):</p>
            <select name='app:stylesheet' class='form-control'>
                <option value=''>Modern (default)</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cyborg/bootstrap.min.css'>Midnight Black</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/united/bootstrap.min.css'>Orange</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/simplex/bootstrap.min.css'>Crisp White</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/darkly/bootstrap.min.css'>Cloudy Night</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cerulean/bootstrap.min.css'>Calm Skies</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/paper/bootstrap.min.css'>Google Material Design</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/superhero/bootstrap.min.css'>Blue Metro</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/sandstone/bootstrap.min.css'>Sandstone</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/lumen/bootstrap.min.css'>Newspaper</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/solar/bootstrap.min.css'>Solar</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/cosmo/bootstrap.min.css'>Cosmo</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/flatly/bootstrap.min.css'>Flatly</option>
                <option value='//maxcdn.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css'>Yeti</option>
            </select>

            <div class='setup-form-buttons'>
                <input type='submit' class='btn btn-success' value='Install'>
                <input type='reset' class='btn btn-warning' value='Clear Fields'>
            </div>
            <input type="hidden" name='_token' value='{{csrf_token()}}' />
        </form>
    </div>

    <div class='col-md-3'></div>
</div>

<div class='setup-footer well'>
    Polr is <a href='https://opensource.org/osd' target='_blank'>open-source
    software</a> licensed under the <a href='//www.gnu.org/copyleft/gpl.html'>GPLv2+
    License</a>.

    <div>
        Polr Version {{env('VERSION')}} released {{env('VERSION_RELMONTH')}} {{env('VERSION_RELDAY')}}, {{env('VERSION_RELYEAR')}} -
        <a href='//github.com/cydrobolt/polr' target='_blank'>Github</a>

        <div class='footer-well'>
            &copy; Copyright {{env('VERSION_RELYEAR')}}
            <a class='footer-link' href='//cydrobolt.com' target='_blank'>Chaoyi Zha</a> &amp;
            <a class='footer-link' href='//github.com/Cydrobolt/polr/graphs/contributors' target='_blank'>other Polr contributors</a>
        </div>
    </div>
</div>

@endsection

@section('js')
<script src="/js/bootstrap.min.js"></script>
<script src='/js/angular.min.js'></script>
<script src='/js/base.js'></script>
<script src='/js/SetupCtrl.js'></script>
@endsection
