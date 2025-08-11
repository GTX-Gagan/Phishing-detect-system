# Phishing Detection System

A machine learning-based system to detect phishing websites by analyzing various website features.

![Phishing Detection](https://img.shields.io/badge/Project-Phishing%20Detection-blue)
![Python](https://img.shields.io/badge/Language-Python-green)
![Machine Learning](https://img.shields.io/badge/ML-Random%20Forest-orange)

## Table of Contents
- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Dataset](#dataset)
- [Model](#model)
- [Contributing](#contributing)

## Introduction
This project aims to detect phishing websites using machine learning techniques. It analyzes various website features like URL structure, domain information, and page content to classify websites as legitimate or phishing.

## Features
- URL-based feature extraction
- Domain-based analysis
- Content-based features
- Machine learning classification
- Real-time prediction capability

## Installation

1. Clone the repository:
git clone https://github.com/GTX-Gagan/Phishing-detect-syst.git
cd Phishing-detect-syst

2.Install required packages:
pip install -r requirements.txt

## Usage
1.To train the model:
python train.py

2.To make predictions on a single URL:
python predict.py --url "http://example.com"

3.For batch prediction (CSV file with URLs):
python predict.py --input urls.csv --output results.csv

## Dataset
The model is trained on a dataset containing both legitimate and phishing websites. The dataset includes features like:

URL length

Presence of special characters

Domain age

HTTPS certificate validity

Page content characteristics

## Model
The system uses a <span style="color:#4CAF50;font-weight:bold">Random Forest classifier</span> trained on the phishing website dataset.

| Metric    | Score |
|-----------|-------|
| Accuracy  | 95%   | 
| Precision | 96%   |
| Recall    | 94%   | 
| F1-Score  | 95%   | 

## Contributing
Contributions are welcome! Please follow these steps:

Fork the project

Create your feature branch (git checkout -b feature/AmazingFeature)

Commit your changes (git commit -m 'Add some AmazingFeature')

Push to the branch (git push origin feature/AmazingFeature)

Open a Pull Request
