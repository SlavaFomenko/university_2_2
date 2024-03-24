const express = require('express')
const router = express.Router()
const userController = require('../controllers/userController')
const authMiddleware = require('../src/middlewares/authorization')

router.get('/users', authMiddleware, userController.getAllUsers)

router.post('/users', userController.createUser)
router.post('/user/login', userController.loginUser)
router.get('/users/:id', userController.getUserById)
router.patch('/users/:id', userController.updateUserById)
router.delete('/users/:id', userController.deleteUserById)

module.exports = router
