const { log } = require('console')
const express = require('express')
const hbs = require('hbs')
const path = require('path')

let app = express()
app.set('view engine', 'hbs')
hbs.registerPartials(path.join(__dirname, 'views/partials'))

app.get('/', (req, res) => {
	res.render('home.hbs', { currentPage: '/' })
})

app.get('/weather', async (req, res) => {
	const { city } = req.query

	if (!city) {
		return req.res.render('weather.hbs', {})
	}

	const url = `https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(
		city
	)}`
	let latitude = ''
	let longitude = ''
	await fetch(url)
		.then(response => response.json())
		.then(data => {
			if (data.length > 0) {
				latitude = data[0].lat
				longitude = data[0].lon
				console.log(
					`Координаты города ${city}: Широта ${latitude}, Долгота ${longitude}`
				)
			} else {
				console.log('Город не найден или произошла ошибка.')
			}
		})
		.catch(error => {
			console.error('Произошла ошибка при выполнении запроса:', error)
		})

	let data = await fetch(
		`https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=237c9e66a4a5373bc7f3fd341a81414f`
	)
		.then(response => response.json())
		.then(data => {
			return data
		})
		.catch(err => console.log(err))

	console.log(data)
	if (data) {
		const icon = data.weather[0].icon
		const temp = (data.main.temp - 273).toFixed(1)
		const name = data.name
		const visibility = data.visibility
		req.res.render('weather-page.hbs', { temp, name, visibility, icon })
		return
	}
})

app.listen(3000, () => {})
