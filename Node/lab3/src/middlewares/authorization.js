const jwt = require('jsonwebtoken')
const User = require('../../models/user')
require('dotenv').config()

const authMiddleware = async (req, res, next) => {
	try {
		const token = req.header('Authorization').replace('Bearer ', '')
		const decoded = jwt.verify(token, process.env.JWT_KEY)

		const user = await User.findById(decoded._id)

		if (!user) {
			throw new Error()
		}
		req.user = user
		next()
	} catch (error) {
		res.status(401).json({ error: 'Please authenticate' })
	}
}

module.exports = authMiddleware
