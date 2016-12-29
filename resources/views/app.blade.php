<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	@if(Config::get('app.debug'))

    <link rel="stylesheet" href="{{asset('build/css/flaticon.css')}}" />
    <link rel="stylesheet" href="{{asset('build/css/font-awesome.css')}}" />
		<link rel="stylesheet" href="{{asset('build/css/components.css')}}" />
		<link rel="stylesheet" href="{{asset('build/css/app.css')}}" />

	@else
	<link rel="stylesheet" href="{{ elixir('css/all.css') }}" />
	@endif

	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>

<load-template url="build/views/templates/menu.html"></load-template>

 <div ng-view></div>

<load-template url="build/views/templates/footer.html"></load-template>

	@if(Config::get('app.debug'))
		<script type="text/javascript" src="{{ asset('build/js/vendor/jquery.min.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/vendor/angular.min.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/vendor/angular-route.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('build/js/vendor/angular-resource.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('build/js/vendor/angular-animate.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('build/js/vendor/angular-messages.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('build/js/vendor/ui-bootstrap-tpls.min.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/vendor/navbar.min.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/vendor/angular-cookies.min.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/vendor/query-string.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/vendor/angular-oauth2.min.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/vendor/ng-file-upload.min.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/vendor/http-auth-interceptor.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/vendor/dirPagination.js') }}" ></script>

		<script type="text/javascript" src="{{ asset('build/js/app.js') }}" ></script>

		<!--===============CONTROLLER================-->
		<script type="text/javascript" src="{{ asset('build/js/controllers/menu.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/login.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/home.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/client/clientList.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/client/clientNew.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/client/clientEdit.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/client/clientRemove.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/client/clientView.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/client/clientDashboard.js') }}" ></script>

		<script type="text/javascript" src="{{ asset('build/js/controllers/projectNote/projectNoteList.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/projectNote/projectNoteNew.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/projectNote/projectNoteEdit.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/projectNote/projectNoteRemove.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/projectNote/projectNoteShow.js') }}" ></script>

		<script type="text/javascript" src="{{ asset('build/js/controllers/project/projectList.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/project/projectNew.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/project/projectEdit.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/project/projectRemove.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/project/projectView.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/project/projectDashboard.js') }}" ></script>


		<script type="text/javascript" src="{{ asset('build/js/controllers/projectFile/projectFileList.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/projectFile/projectFileNew.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/projectFile/projectFileEdit.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/projectFile/projectFileRemove.js') }}" ></script>

		<script type="text/javascript" src="{{ asset('build/js/controllers/projectMember/projectMemberList.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/projectMember/projectMemberNew.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/projectMember/projectMemberEdit.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/projectMember/projectMemberRemove.js') }}" ></script>

		<script type="text/javascript" src="{{ asset('build/js/controllers/projectTask/projectTaskList.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/projectTask/projectTaskNew.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/projectTask/projectTaskEdit.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/controllers/projectTask/projectTaskRemove.js') }}" ></script>

		<script type="text/javascript" src="{{ asset('build/js/controllers/loginModal.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/directives/loginForm.js') }}" ></script>

		<!--==============SERVICE====================-->
		<script type="text/javascript" src="{{ asset('build/js/services/url.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/services/oauthFixInterceptor.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/services/client.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/services/projectNote.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/services/projectFile.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/services/projectMember.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/services/projectTask.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/services/project.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/services/user.js') }}" ></script>



		<!--==============FILTER====================-->
		<script type="text/javascript" src="{{ asset('build/js/filters/date-br.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/filters/uniqueNameLimit.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/filters/coverterStatus.js') }}" ></script>

		<!--==============DIRECTIVES====================-->
		<script type="text/javascript" src="{{ asset('build/js/directives/projectFileDownload.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/directives/loadTemplate.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/directives/menu-actived.js') }}" ></script>
		<script type="text/javascript" src="{{ asset('build/js/directives/tab.js') }}" ></script>
	@else
     <script type="text/javascript" src="{{ elixir('js/all.js') }}"></script>
	@endif


</body>
</html>
