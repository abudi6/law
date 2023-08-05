// routes.js
import express from 'express';
import { login as loginHandler } from '../controllers/authe.js';
import { register as registerHandler } from '../controllers/authe.js';

const router = express.Router();

router.post('/login', loginHandler);
router.post('/register', registerHandler);

export default router;
