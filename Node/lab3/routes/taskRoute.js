const express = require('express')
const router = express.Router()
const taskController = require('../controllers/taskController')
const authMiddleware = require('../src/middlewares/authorization')

router.post('/tasks', authMiddleware, taskController.createTask)
router.get('/tasks', authMiddleware, taskController.getAllTasks)
router.get('/tasks/:id', authMiddleware, taskController.getTaskById)
router.patch('/tasks/:id', authMiddleware, taskController.updateTaskById)
router.delete('/tasks/:id', authMiddleware, taskController.deleteTaskById)

module.exports = router
