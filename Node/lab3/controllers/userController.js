const User = require('../models/user')

exports.updateUserById = async (req, res) => {
	try {
		const userId = req.params.id
		const updates = req.body
		console.log(updates)

		const user = await User.findById(userId)

		if (!user) {
			return res.status(404).json({ error: 'User not found' })
		}

		Object.keys(updates).forEach(key => {
			user[key] = updates[key]
		})

		await user.save()

		res.status(200).json(user)
	} catch (error) {
		res.status(500).json({ error: error.message })
	}
}

exports.createUser = async (req, res) => {
	try {
		const { name, age, password } = req.body
		console.log(password)
		const newUser = new User({ name, age, password })
		await newUser.save()
		res.status(201).json(newUser)
	} catch (error) {
		res.status(500).json({ error: error.message })
	}
}

exports.getAllUsers = async (req, res) => {
	try {
		const users = await User.find()
		res.status(200).send(users)
	} catch (error) {
		res.status(500).send(error)
	}
}

exports.getUserById = async (req, res) => {
	const userId = req.params.id

	try {
		const user = await User.findById(userId)
		if (!user) {
			return res.status(404).send({ error: 'User not found' })
		}
		res.status(200).send(user)
	} catch (error) {
		res.status(500).send(error)
	}
}

exports.deleteUserById = async (req, res) => {
	try {
		const userId = req.params.id
		const deletedUser = await User.findByIdAndDelete(userId)
		if (!deletedUser) {
			return res.status(404).json({ error: 'User not found' })
		}
		res.status(200).json({ message: 'User deleted successfully', deletedUser })
	} catch (error) {
		res.status(500).json({ error: error.message })
	}
}
