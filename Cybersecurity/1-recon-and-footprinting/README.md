# 1. Reconnaissance & Footprinting

## What is this?

Reconnaissance (recon) and footprinting is the first phase of the ethical hacking / penetration testing lifecycle. It's the process of gathering as much information as possible about a target — organization, domain, network, or people — **before** any direct interaction or exploitation is attempted.

Think of it as the "research" phase: the more accurate information gathered here, the more precise and efficient every later phase (scanning, exploitation, reporting) becomes.

## Passive vs Active Recon

| | Passive Recon | Active Recon |
|---|---|---|
| **Definition** | Gathering info without directly touching the target's systems | Directly interacting with target infrastructure |
| **Detectability** | Undetectable by the target | Can be logged/detected by the target |
| **Examples** | WHOIS lookups, DNS records, certificate transparency logs, search engine dorking, public breach data, social media OSINT | Port scanning, banner grabbing, live host probing, WAF fingerprinting |
| **Authorization needed** | Generally low-risk, but still scoped to the engagement | Requires explicit authorization |

Most subdomain enumeration is passive (querying third-party data sources). Checking if a subdomain is *live*, or fingerprinting its *WAF*, involves lightweight direct interaction — so it sits closer to active recon and should only be done within authorized scope.

## Why it matters

- Maps the target's **attack surface** (subdomains, exposed services, technologies in use)
- Identifies **forgotten or misconfigured assets** (old subdomains, dev/staging environments) that are common weak points
- Informs **what defenses are in place** (WAFs, firewalls) so later testing can be planned realistically
- Forms the evidence base for a professional penetration test report

## Key terms

- **Subdomain**: a domain that is part of a larger parent domain (e.g., `mail.example.com` is a subdomain of `example.com`)
- **Live vs dead subdomain**: a *live* subdomain resolves via DNS and/or responds to HTTP(S) requests; a *dead* subdomain either doesn't resolve or resolves but doesn't respond — often a sign of decommissioned infrastructure (and a potential subdomain takeover risk)
- **WAF (Web Application Firewall)**: a layer that filters/monitors HTTP traffic to a web application, defending against common attacks
- **Certificate Transparency (CT) logs**: public logs of all SSL/TLS certificates issued, often revealing subdomains that were never meant to be public

## Assignments in this module

| # | Assignment | Description |
|---|-----------|--------------|
| 1.1 | [africahackon.com Recon Assignment](./1.1-africahackon-assignment/report.md) | Subdomain enumeration, live/dead classification, and WAF fingerprinting using 5+ tools |
