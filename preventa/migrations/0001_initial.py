# Generated by Django 2.2.3 on 2019-07-08 01:56

from django.db import migrations, models
import django.db.models.deletion


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='CabVenta',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('usuarioNombre', models.CharField(max_length=75)),
                ('fecha', models.DateField()),
                ('estado', models.BooleanField(default=True)),
                ('fechaCreacion', models.DateTimeField(auto_now_add=True)),
            ],
        ),
        migrations.CreateModel(
            name='DetVenta',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('productoNombre', models.CharField(max_length=75)),
                ('cantidad', models.IntegerField()),
                ('precio', models.DecimalField(decimal_places=2, max_digits=5)),
                ('iva', models.DecimalField(decimal_places=2, max_digits=5)),
                ('descuento', models.DecimalField(decimal_places=2, max_digits=5)),
                ('estado', models.BooleanField(default=True)),
                ('fechaCreacion', models.DateTimeField(auto_now_add=True)),
                ('idCabVenta', models.ForeignKey(on_delete=django.db.models.deletion.CASCADE, to='preventa.CabVenta')),
            ],
        ),
    ]
