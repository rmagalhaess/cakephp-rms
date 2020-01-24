        <center>
		<h1> Ricardo de Magalhães Simões </h1>
		<h2> Arquivo: "R:\GitHub\cakephp-rms\src\Template\Pages\home.ctp" </h2>
		</center>
		<hr>
		<pre><?php echo "FILE: ".__FILE__; ?></pre><hr>
		<pre><?php print_r($_SERVER); ?></pre><hr>
		<hr>
		
		<div class="row">
          <section class='col-xs-12 col-sm-6 col-md-6'>
            <section>
              <h2>How to use this example application</h2>
                <p>For instructions on how to use this application with OpenShift, start by reading the <a href="http://docs.okd.io/latest/dev_guide/templates.html#using-the-quickstart-templates">Developer Guide</a>.</p>

              <h2>Deploying code changes</h2>
                <p>
                  The source code for this application is available to be forked from the <a href="https://www.github.com/sclorg/cakephp-ex">OpenShift GitHub repository</a>.
                  You can configure a webhook in your repository to make OpenShift automatically start a build whenever you push your code:
                </p>

				<ol>
				  <li>From the Web Console homepage, navigate to your project</li>
				  <li>Click on Browse &gt; Builds</li>
				  <li>Click the link with your BuildConfig name</li>
				  <li>Click the Configuration tab</li>
				  <li>Click the "Copy to clipboard" icon to the right of the "GitHub webhook URL" field</li>
				  <li>Navigate to your repository on GitHub and click on repository settings &gt; webhooks &gt; Add webhook</li>
				  <li>Paste your webhook URL provided by OpenShift</li>
				  <li>Leave the defaults for the remaining fields &mdash; that's it!</li>
				</ol>
				<p>After you save your webhook, if you refresh your settings page you can see the status of the ping that Github sent to OpenShift to verify it can reach the server.</p>
				<p>Note: adding a webhook requires your OpenShift server to be reachable from GitHub.</p>

            </section>

          </section>
          <section class="col-xs-12 col-sm-6 col-md-6">

                <h2>Managing your application</h2>

                <p>Documentation on how to manage your application from the Web Console or Command Line is available at the <a href="http://docs.okd.io/latest/dev_guide/overview.html">Developer Guide</a>.</p>

                <h3>Web Console</h3>
                <p>You can use the Web Console to view the state of your application components and launch new builds.</p>

                <h3>Command Line</h3>
                <p>With the <a href="http://docs.okd.io/latest/cli_reference/overview.html">OpenShift command line interface</a> (CLI), you can create applications and manage projects from a terminal.</p>

                <h2>Development Resources</h2>
                  <ul>
                    <li><a href="http://docs.okd.io/latest/welcome/index.html">OpenShift Documentation</a></li>
                    <li><a href="https://github.com/openshift/origin">Openshift Origin GitHub</a></li>
                    <li><a href="https://github.com/openshift/source-to-image">Source To Image GitHub</a></li>
                    <li><a href="http://docs.okd.io/latest/using_images/s2i_images/php.html">Getting Started with PHP on OpenShift</a></li>
                    <li><a href="http://stackoverflow.com/questions/tagged/openshift">Stack Overflow questions for OpenShift</a></li>
                    <li><a href="http://git-scm.com/documentation">Git documentation</a></li>
                  </ul>

                <h2>Request information</h2>
                <p>Page view count:
               <?php
                    use Cake\Datasource\ConnectionManager;

                    $hasDB=1;
                    $tableExisted=0;
                    try {
                      $connection = ConnectionManager::get('default');
                    } catch(Exception $e) {
                      $hasDB=0;
                    }
                    if ($hasDB) {
                        try {
                          $connection->execute('create table view_counter (c integer)');
                        } catch (Exception $e) {
                        	$tableExisted=1;
                        }
                        try {
                            if ($tableExisted==0) {
                            	$connection->execute('insert into view_counter values(1)');
                            } else {
                                $connection->execute('update view_counter set c=c+1');
                            }
                            $result=$connection->execute('select * from view_counter')->fetch('assoc');;
                        } catch (Exception $e) {
                            $hasDB=0;
                        }
                    }
                ?>
                <?php if ($hasDB==1) : ?>
                   <span class="code" id="count-value"><?php print_r($result['c']); ?></span>
                   </p>
                <?php else : ?>
                   <span class="code" id="count-value">No database configured</span>
                   </p>
                <?php endif; ?>

          </section>
        </div>