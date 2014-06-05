
<html xmlns="http://www.w3.org/1999/xhtml" lang="es-ES"><head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
		<!-- add-ons -->
	<link rel="pingback" href="http://joincic.com.ve/xmlrpc.php">
	<link rel="stylesheet" href="http://joincic.com.ve/wp-content/themes/joincic-7ma/style.css" type="text/css" media="screen">

	<link href="http://fonts.googleapis.com/css?family=Dosis" rel="stylesheet" type="text/css">

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	
	<?php 

 		Yii::app()->bootstrap->register();

	?>
	</head>

<body >


<!-- calling header -->
	<div id="headerWrapper">
		<div id="header">

			<center>
				<div id="logo"></div>
				<h2 title="JORNADAS INTERUNIVERSITARIAS DE CIENCIAS DE LA COMPUTACIÓN">JORNADAS INTERUNIVERSITARIAS DE CIENCIAS DE LA COMPUTACIÓN</h2>
			</center>
			<div id="mainmenu">
				<?php $this->widget('bootstrap.widgets.TbNavbar', array( 
					'brand' => '',
					'brandUrl' => false,
					'fixed' => false,
					'collapse' => false,
					'items' => array(
						array(
							'class' => 'bootstrap.widgets.TbMenu',
							'encodeLabel' => false,
							'items' =>
								 array(									
									array(  
											'label'=>Yii::t('general','Login'), 
											'items' => array(
												array( 'label' => 
															'<div style="width: 150px; display: block;">'.
																$this->renderPartial('/site/_login',array('model'=>new LoginForm()),true).
															'</div>'
												),
											),
											'visible'=>Yii::app()->user->isGuest
									),
									array(
										'label'=>'Enviar por cedulas', 
										'url'=>CHtml::normalizeUrl(array('/Messages/SendByCedulas')), 
										'visible'=>!Yii::app()->user->isGuest
									),
									array(
										'label'=>'Enviar Mensajes', 
										'url'=>CHtml::normalizeUrl(array('/Messages/Send')), 
										'visible'=>!Yii::app()->user->isGuest
									),
									array('label'=>Yii::t('general','Logout').' ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
								),
							'htmlOptions'=>array(
								'class' => 'pull-right',
							),
					   )
				    ),
					'htmlOptions'=>array(
						'class' => ' pull-right',
					),
				)); ?>
			</div><!-- mainmenu -->
			<div class="clear"></div>
		</div>

		
	</div>
<!-- ending header -->

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>
</div><!-- page -->

		
</body></html>


