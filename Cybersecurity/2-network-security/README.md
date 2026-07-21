# 2. Network Fundamentals

This module covers the building blocks of how computer networks actually work, the foundation everything later in this course (and in security work generally) sits on top of. Before you can spot something abnormal on a network, you need a solid grip on what normal looks like.

## What's inside

- [`2.1-http-cap-analysis`](./2.1-africahackon-http-cap-analysis) — a hands on Wireshark walkthrough tracing a real HTTP conversation packet by packet, from DNS lookup through the TCP handshake to the final response

## Core concepts covered

### What is a computer network

A computer network is a group of interconnected devices that exchange data and resources with each other. Three things make this possible:

- **Network devices (nodes):** the physical hardware involved, computers, routers, switches
- **Links:** the medium connecting everything, cables or wireless signals
- **Protocols:** the shared rules every device follows so they can understand each other

### Why networks matter

Resource sharing, supporting business applications, centralizing data, enabling remote work, knowledge sharing, quick access to information, and integrating technologies like IoT devices.

### Types of networks, by size

- **PAN:** personal devices (phone to earbuds)
- **LAN:** a single building or office
- **MAN:** a city
- **WAN:** a country or the globe, the internet itself is the largest WAN

### Internetworking

Connecting separate networks together so they can communicate, literally where the word "internet" comes from.

- **Intranet:** private network inside one organization
- **Extranet:** private network with limited, controlled outside access
- **VPN:** a secure, encrypted tunnel over a public network

### Topologies and architecture

Bus, ring, mesh, star, tree, and hybrid describe how devices are physically or logically arranged. Client server and peer to peer describe how devices interact, most of the internet runs on client server (your browser requests, a server responds).

### Common devices

Router, switch, hub, firewall, modem, network interface card (NIC), repeater, bridge, each with a distinct role in moving or protecting traffic.

### Wired and wireless media

Twisted pair and coaxial copper cabling, fiber optic cabling for high bandwidth long distance transmission, and wireless standards like Wi-Fi (2.4/5 GHz, secured via WPA2/WPA3) and Bluetooth for short range connections.

### The TCP/IP and OSI models

TCP/IP is the four layer framework (Application, Transport, Internet, Network Access) that actually runs the internet. OSI is a more detailed seven layer conceptual model (Application, Presentation, Session, Transport, Network, Data Link, Physical) used to reason about network communication in depth.

### Encapsulation and decapsulation

As data travels down the layers on the sending side, each layer wraps it with its own header, this is encapsulation. On the receiving side, each layer strips its header as data moves back up, this is decapsulation. The `2.1` assignment in this folder traces this exact process using a real packet capture.

## Tools used in this module

- Wireshark (packet capture and analysis)
