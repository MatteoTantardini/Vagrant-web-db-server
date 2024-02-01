# -*- mode: ruby -*-
# vi: set ft=ruby :
Vagrant.configure("2") do |config|

  PROXY_URL = "http://10.20.5.51:8888"
  NO_PROXY = "localhost,127.0.0.1"
  BOX_IMAGE = "ubuntu/jammy64"
  BASE_HOST_ONLY_NETWORK = "192.168.56.10"
  PROXY_ENABLE = true

  config.vm.define "web.m340" do |subconfig|
    subconfig.vm.box = BOX_IMAGE
    subconfig.vm.hostname = "web-m340"
    subconfig.ssh.insert_key = false
    subconfig.vm.provider "virtualbox" do |vb|
      vb.name = "web.m340"
      vb.gui = true
      vb.memory = "1024"
    end

    if PROXY_ENABLE
      subconfig.proxy.http = PROXY_URL
      subconfig.proxy.https = PROXY_URL
      subconfig.proxy.no_proxy = NO_PROXY
    end

    if !Vagrant.has_plugin?("vagrant-proxyconf") && PROXY_ENABLE
      system "vagrant plugin install vagrant-proxyconf"
    end

    #if Vagrant.has_plugin?("vagrant-proxyconf") && PROXY_ENABLE
    #  subconfig.proxy.http = PROXY_URL
    #  subconfig.proxy.https = PROXY_URL
    #  subconfig.proxy.no_proxy = NO_PROXY
    #end
    BASE_INT_NETWORK = "10.10.20.10"

	  subconfig.vm.network "private_network", ip: BASE_INT_NETWORK, virtualbox__intnet: true
	  subconfig.vm.network "private_network", ip: BASE_HOST_ONLY_NETWORK

    subconfig.vm.synced_folder "./site", "/var/www/html"

    #PROVISIONING FROM EXTERNAL FILE
    subconfig.vm.provision "shell", path: "scripts/provision_web.sh"
  end

  config.vm.define "db.m340" do |subconfig|
    subconfig.vm.box = BOX_IMAGE
    subconfig.vm.hostname = "db-m340"
    subconfig.ssh.insert_key = false
    subconfig.vm.provider "virtualbox" do |vb|
      vb.name = "db.m340"
      vb.gui = true
      vb.memory = "1024"
    end

    if PROXY_ENABLE
      subconfig.proxy.http = PROXY_URL
      subconfig.proxy.https = PROXY_URL
      subconfig.proxy.no_proxy = NO_PROXY
    end

    if !Vagrant.has_plugin?("vagrant-proxyconf") && PROXY_ENABLE
      system "vagrant plugin install vagrant-proxyconf"
    end

    #if Vagrant.has_plugin?("vagrant-proxyconf") && PROXY_ENABLE
    #  subconfig.proxy.http = PROXY_URL
    #  subconfig.proxy.https = PROXY_URL
    #  subconfig.proxy.no_proxy = NO_PROXY
    #end
    BASE_INT_NETWORK = "10.10.20.11"

    subconfig.vm.network "private_network", ip: BASE_INT_NETWORK, virtualbox__intnet: true
    subconfig.vm.provision "shell", path: "scripts/provision_db_mysql.sh"
  end
end
