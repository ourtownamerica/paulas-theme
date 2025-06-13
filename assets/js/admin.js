if(top.location.href.includes('wp-admin/customize.php') ||
	top.location.href.includes('wp-admin/theme-editor.php')){
	
	top.document.body.innerHTML = `<div class='container'>
		<h1>This feature is disabled for Paula's Theme.</h1>
		<p><big>Please edit the theme files directly:</big></p>
		<ol>
			<li>Clone the repo: <a href='https://github.com/ourtownamerica/paulas-theme'>https://github.com/ourtownamerica/paulas-theme</a>.</li>
			<li>Make your changes.</li>
			<li>Push your changes back to GitHub.</li>
			<li>SSH in to the Kinsta site.</li>
			<li>Move to the theme directory: <code>cd ~/public/wp-content/themes/paulas_theme/</code></li>
			<li>Pull your changes: <code>git pull</code></li>
		</ol>
	</div>`;
}

const params = new URLSearchParams(window.location.search);
if(top.location.href.includes('wp-admin/plugin-install.php') && !params.get('continue')){
	let new_url = top.location.href.replace('plugin-install.php', 'plugin-install.php?continue=1');
	top.document.body.innerHTML = `<div class='container'>
		<h1>Please think twice.</h1>
		<p><big>Plugins are difficult to maintain and can cause unforseen problems down the road. We have an entire IT department that can implement whatever feature you need. Please consider speaking with them before installing any plugins.</big></p>
		<a href='${new_url}' class='btn btn-forest'>Show me the plugins</a>
		
	</div>`;
}