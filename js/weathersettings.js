$(document).ready(function() {
		$.simpleWeather({
			zipcode: '',
			woeid: '23405825',
			location: '',
			unit: 'c',
			success: function(weather) {
				html = '<p class="temperature"><span class="tempnum">' + weather.temp + '</span><span class="deg">&deg; </span>';
				html += '<img alt="' + weather.currently + ' weather icon" width="32" src="/wp-content/themes/BMPtheme/images/weather/' + weather.code + '.png">';
				html += '<p class="currently">' + weather.currently + '</p>';
				$("#weather").html(html);
			},
			error: function(error) {
				$("#weather").html('<p>' + error + '</p>');
			}
		});
	});