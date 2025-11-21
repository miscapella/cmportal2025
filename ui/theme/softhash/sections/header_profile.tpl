<li class="nav-header" style="background: url({$app_url}ui/lib/imgs/user-info.jpg) no-repeat;">
	<div class="dropdown profile-element"> <span style="max-width: 64px;margin-left:auto;margin-right:auto;display:block;padding-bottom:10px">

{if $user['img'] eq 'gravatar'}
<img src="http://www.gravatar.com/avatar/{($user['username'])|md5}?s=64" class="img-circle" alt="{$user['fullname']}">
			{elseif $user['img'] eq ''}
				<img src="{$app_url}ui/lib/imgs/default-user-avatar.png"  class="img-circle" style="max-width: 64px;" alt="">
			{else}
				<img src="{$user['img']}" class="img-circle" style="max-width: 64px;margin-left:auto;margin-right:auto;display:block" alt="{$user['fullname']}">
{/if}
		 </span>
		<a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false">
		<span class="clear profile-text"> <span class="block m-t-xs"> <strong class="font-bold">{$user['fullname']}</strong>
		 </span> <span class="text-muted text-xs block">{$_L['My Account']} <b class="caret"></b></span> </span> </a>
		<ul class="dropdown-menu animated fadeIn m-t-xs">
			<li><a href="{$_url1}settings/users-edit/{$user['id']}/">{$_L['Edit Profile']}</a></li>

			<li class="divider"></li>
			<li><a href="{$_url1}logout/">{$_L['Logout']}</a></li>
		</ul>
	</div>
</li>
