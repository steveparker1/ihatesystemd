<?php include("../assets/head.html"); ?>
        <section id="content" name="content"></section>
        <div id="f">
                <div class="container">
                        <div class="row">

				<h3>The Ugly</h3>
				<p class="centered"><i class="icon icon-circle"></i><i class="icon icon-circle"></i><i class="icon icon-circle"></i></p>
				
				<div class="col-lg-6 col-lg-offset-3">
					<p>Some things about systemd aren't necessarily <b>bad</b>, they're just damned <b>Ugly</b>.
				</div>								
			</div> <!-- /row -->

			<div class="row">
<h3>After=network.target</h3>
<div class="col-lg-10 col-lg-offset-1 text-justify">
<p>
If you define <code>After=network.target</code> in a Unit file, that means nothing to systemd. And certainly does not mean what you would be likely to expect it to mean:</p>
<blockquote><p>network.target has very little meaning during start-up. It only indicates that the network management stack is up after it has been reached. Whether any network interfaces are already configured when it is reached is undefined. It's [sic] primary purpose is for ordering things properly at shutdown: since the shutdown ordering of units in systemd is the reverse of the startup ordering, any unit that is order After=network.target can be sure that it is stopped before the network is shut down if the system is powered off.</p>
<footer> -- <a target="_blank" rel=nofollow href="https://www.freedesktop.org/wiki/Software/systemd/NetworkTarget/">https://www.freedesktop.org/wiki/Software/systemd/NetworkTarget/</a></footer>
</blockquote>
</p>
</div>
</div>



<div class="row"><h3>list-dependencies</h3><div class="col-lg-10 col-lg-offset-1 text-justify">
<p>systemctl contains a <code>list-dependencies</code> command:</p>
<pre>
systemctl list-dependencies --after gdm.service
</pre>
<p>However, this lists all things that contain an "After: gdm-service" in their definition, not the things that are <b>after</b> gdm.service in the dependencies tree.</p>
<p>So it actually shows the things that start <b>before</b> gdm.service, not <b>after</b> it.
(similarly “--before” shows those that start <b>after</b> gdm, not <b>before</b> it)
</p></div></div>

<div class="row"><h3>systemctl show</h3><div class="col-lg-10 col-lg-offset-1 text-justify">
<p><code>systemctl show sshd</code> shows the settings of sshd. These come from the <code>/lib/systemd/system/sshd.service</code> file, merged with the default system-wide settings. That's fair enough, I am sure you will agree. Quite useful, in fact.</p>
<p>If you try <code>systemctl show SomeServiceNameIJustMadeUp</code>, it will show the default settings, even though there is no such service. It won't tell you there's no such service, it will just plough on and let you wallow in your misconception that it is a valid service. Thanks, systemd.</p>
</p></div></div>
<!-- /template -->

<!-- really just here as a template -->
<div class="row"><h3>More</h3><div class="col-lg-10 col-lg-offset-1 text-justify">
<p>There's always more ...
</p></div></div>
<!-- /template -->


</div><!-- /container --></div><!-- /f -->

<?php include("../assets/foot.html"); ?>
