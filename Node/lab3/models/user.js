const mongoose = require('mongoose')
const bcrypt = require('bcrypt')
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
	// email: {
	// 	type: String,
	// 	required: true,
	// 	lowercase: true,
	// 	unique: true,
	// 	validate(value) {
	// 		if (!validator.isEmail(value)) {
	// 			throw new Error('Invalid email address')
	// 		}
	// 	},
	// },
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

userSchema.pre('save', async function (next) {
	console.log('hello')
	const user = this
	if (user.isModified('password')) return next()
	try {
		const salt = await bcrypt.genSalt(10)
		const hash = await bcrypt.hash(user.password, salt)
		user.password = hash
		console.log(user)

		next()
	} catch (error) {
		return next(error)
	}
})

const User = mongoose.model('User', userSchema)

module.exports = User
