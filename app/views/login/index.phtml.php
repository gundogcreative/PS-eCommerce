<!DOCTYPE html>
<html>
    <head>

   	<meta charset="utf-8" />   
   	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<title><?php echo $title; ?></title>

	<meta name="description" content="" />
	<meta property="og:site_name" content="" /> 

    <!-- CSS -->
    <?php echo $this->assets->outputCss(); ?>

    </head>
    <body>

    <!-- JS -->
    <?php echo $this->assets->outputJs(); ?>

        <div class="pageContent">

            <header>

            </header>

            <div class="content">
                <div class="newForm login">
                <h3>Login</h3>
                <?php echo $this->tag->form(array('login/start', 'method' => 'post')); ?>
                <div class="row">
                    <div class="small-6 columns">
                        <label for="email">Username<small>required</small>
                        <?php echo $this->tag->textField(array("username", "size" => "30")) ?>
                    </label>
                    </div>
                </div>

                <div class="row">
                    <div class="small-6 columns">
                        <label for="password">Password<small>required</small>
                        <?php echo $this->tag->passwordField(array("password", "size" => "30")) ?>
                    </label>
                    </div>
                </div>
                <div class="row">
                    <?php $this->flashSession->output() ?>
                </div>
                <?php echo $this->tag->submitButton(array('login')); ?> 
                </form>
                </div>  
            </div>
        </div>

    </body>
</html>