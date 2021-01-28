        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="http://bibliotheksrekonstruktion.hab.de">Home</a></li>
<?php foreach ($categories as $key => $category): ?>
                    <li<?php echo $category['active']; ?>><a href="<?php echo $key; ?>"><?php echo $category['label']; ?></a></li>
<?php endforeach; ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li style="margin-right:1em;"><img src="assets/images/icon.svg" height="50" alt="Logo HAB"/></li>
                </ul>
            </div>
        </nav>
