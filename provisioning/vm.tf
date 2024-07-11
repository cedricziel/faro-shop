variable "hcloud_token" {
  default = ""
  sensitive = true
}

provider "hcloud" {
  token = "${var.hcloud_token}"
}

resource "hcloud_server" "node" {
  name = "node-${count.index}"
  server_type = "cx11"
}
