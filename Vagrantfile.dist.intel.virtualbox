Vagrant.configure("2") do |config|

    config.vm.box = "bento/ubuntu-20.04"
    config.vm.network :private_network, ip: "192.168.56.133"
    config.vm.synced_folder "./", "/vagrant", :type => "nfs"
    config.vm.define "default"
    config.vm.hostname = "default"

    config.vm.provider "virtualbox" do |v|
        v.memory = 2048
        v.cpus = 2
        v.name = "DWPTest"
    end

    config.vm.provision "ansible" do |ansible|
        ansible.inventory_path = "provision/inventories/dev"
        ansible.playbook = "provision/initial_provision.yml"
        # ansible.tags =
        # ansible.verbose = 'vvvv'
        ansible.raw_arguments = ['--timeout=30']
    end

end