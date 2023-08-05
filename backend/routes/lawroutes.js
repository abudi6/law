import express from "express";
import {find as findHandler} from '../controllers/lawcon.js';

const router = express.Router();

router.post('/find', findHandler);

export default router;