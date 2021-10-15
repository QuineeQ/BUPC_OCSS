loadScript('dashboard');
loadScript('ripple');
loadScript('showPassword');
loadScript('alert');
loadScript('selectInput');

function loadScript(fileName) {
	document.write('<script type="text/javascript" src="/repository/assets/themes/material-ui/scripts/components/' + fileName + '.js"></script>');
}