const User = require('../models/user')

exports.createUser = async (req, res) => {
	try {
		const { name, age } = req.body
		const newUser = new User({ name, age })
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
