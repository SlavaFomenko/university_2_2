const yargs = require('yargs')
const user = require('./user')

yargs.command({
	command: 'add',
	describe: 'Додати мову',
	builder: {
		title: {
			describe: 'Назва мови',
			demandOption: true,
			type: 'string',
		},
		level: {
			describe: 'Рівень володіння',
			demandOption: true,
			type: 'string',
		},
	},
	handler: argv => {
		user.addLanguage(argv.title, argv.level)
	},
})

// Команда видалення мови
yargs.command({
	command: 'remove',
	describe: 'Видалити мову',
	builder: {
		title: {
			describe: 'Назва мови',
			demandOption: true,
			type: 'string',
		},
	},
	handler: argv => {
		user.removeLanguage(argv.title)
	},
})

// Команда виведення списку мов
yargs.command({
	command: 'list',
	describe: 'Вивести список мов',
	handler: () => {
		user.listLanguages()
	},
})

// Команда виведення деталей мови
yargs.command({
	command: 'read',
	describe: 'Вивести деталі мови',
	builder: {
		title: {
			describe: 'Назва мови',
			demandOption: true,
			type: 'string',
		},
	},
	handler: argv => {
		user.readLanguage(argv.title)
	},
})

yargs.parse()
