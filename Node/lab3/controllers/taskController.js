const Task = require('../models/task')

exports.createTask = async (req, res) => {
	try {
		const { title, description } = req.body
		const task = new Task({ title, description, owner: req.user.id })
		await task.save()
		res.status(201).send(task)
	} catch (error) {
		res.status(400).send(error)
	}
}

exports.updateTaskById = async (req, res) => {
	try {
		const taskId = req.params.id
		const updates = req.body

		const task = await Task.findOneAndUpdate(
			{ _id: taskId, owner: req.user.id },
			updates,
			{ new: true }
		)

		if (!task) {
			return res.status(404).json({ error: 'Task not found' })
		}

		res.status(200).json(task)
	} catch (error) {
		res.status(500).json({ error: error.message })
	}
}

exports.getTaskById = async (req, res) => {
	try {
		const taskId = req.params.id
		const task = await Task.findOne({ _id: taskId, owner: req.user.id })
		if (!task) {
			return res.status(404).send({ error: 'Task not found' })
		}
		res.status(200).send(task)
	} catch (error) {
		res.status(500).send(error)
	}
}

exports.deleteTaskById = async (req, res) => {
	try {
		const taskId = req.params.id
		const deletedTask = await Task.findOneAndDelete({
			_id: taskId,
			owner: req.user.id,
		})
		if (!deletedTask) {
			return res.status(404).json({ error: 'Task not found' })
		}
		res.status(200).json({ message: 'Task deleted successfully', deletedTask })
	} catch (error) {
		res.status(500).json({ error: error.message })
	}
}

exports.getAllTasks = async (req, res) => {
	try {
		const tasks = await Task.find()
		res.status(200).send(tasks)
	} catch (error) {
		res.status(500).send(error)
	}
}
