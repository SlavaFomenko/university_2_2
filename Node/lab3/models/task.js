const mongoose = require('mongoose')
const Schema = mongoose.Schema

const taskSchema = new Schema({
	title: {
		type: String,
		required: true,
		trim: true,
	},
	description: {
		type: String,
		required: true,
		trim: true,
	},
	completed: {
		type: Boolean,
		default: false,
	},
})

const Task = mongoose.model('Task', taskSchema)

module.exports = Task
