const mongoose = require('mongoose')
const validator = require('validator')
const Schema = mongoose.Schema

const userSchema = new Schema({
	name: { type: String, required: true, trim: true },
	age: {
		type: Number,
		default: 0,
		required: true,
		validate(value) {
			if (value < 0) {
				throw new Error('Age must be a positive')
			}
		},
	},
	email: {
		type: String,
		required: true,
		lowercase: true,
		unique: true,
		validate(value) {
			if (!validator.isEmail(value)) {
				throw new Error('Invalid email address')
			}
		},
	},
	password: {
		type: String,
		required: true,
		trim: true,
		minlength: 7,
		validate(value) {
			if (value.toLowerCase().includes('password')) {
				throw new Error('Password cannot contain the word "password"')
			}
		},
	},
})

const User = mongoose.model('User', userSchema)

module.exports = User
