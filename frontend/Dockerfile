Frontend:

# Set the base image to use
FROM node:14-alpine

# Set the working directory
WORKDIR /app

# Install the application dependencies
COPY package*.json ./
RUN npm install

# Copy the application code
COPY . .

# #RUN APPLICATION
RUN npm run build

# Expose the port
EXPOSE 3000

# Define the command to run the application
CMD [ "npm", "run", "dev" ]