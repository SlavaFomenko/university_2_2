const mongoose = require('mongoose')
const bcrypt = require('bcrypt')
const jwt = require('jsonwebtoken')
require('dotenv').config()
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
	const user = this

	if (!user.isModified('password')) {
		console.log('hello')
		return next()
	}
	try {
		const salt = await bcrypt.genSalt(10)
		const hash = await bcrypt.hash(user.password, salt)
		user.password = hash
		console.log(user.password)

		next()
	} catch (error) {
		return next(error)
	}
})

userSchema.statics.findOneByCredentials = async function (name, password) {
	const user = await this.findOne({ name })

	if (!user) {
		throw new Error('User not found')
	}

	const isPasswordValid = await bcrypt.compare(password, user.password)

	if (!isPasswordValid) {
		throw new Error('Invalid password')
	}

	return user
}

userSchema.methods.generateAuthToken = async function () {
	const user = this
	const token = jwt.sign({ _id: user._id.toString() }, process.env.JWT_KEY, {
		expiresIn: '48h',
	})
	return token
}

const User = mongoose.model('User', userSchema)

module.exports = User
