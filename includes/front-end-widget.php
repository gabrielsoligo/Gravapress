<?php
	echo $before_widget;

	echo $before_title . $title . $after_title;

	echo $gravatar_profile->{'entry'}[0]->{'name'}->{'formatted'};

	echo $after_widget;

?>