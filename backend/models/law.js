const mongoose = require('mongoose');

const sectionSchema = new mongoose.Schema({
  content: {
    type: String,
    required: true,
  },
});

const headingSchema = new mongoose.Schema({
  headingTitle: {
    type: String,
    required: true,
  },
  sections: [sectionSchema],
});

const lawSchema = new mongoose.Schema({
  lawId: {
    type: Number,
    required: true,
  },
  lawTitle: {
    type: String,
    required: true,
  },
  headings: [headingSchema],
});

const Law = mongoose.model('Law', lawSchema);

module.exports = Law;
