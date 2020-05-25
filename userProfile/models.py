from django.db import models
from django.contrib.auth.models import User
from cloudinary.models import CloudinaryField


class UserProfile(models.Model):
    user = models.OneToOneField(User, on_delete=models.CASCADE)

    # avatar = models.ImageField(upload_to="users")
    avatar = CloudinaryField(upload_to="users")

    def __str__(self):
        return self.user.email
