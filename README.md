# Faro Shop

A simple e-commerce website built with PHP, PostgreSQL. 
Monitored by Grafana Application Observability.

## Running it

### In K8s (kind)

1. Follow the instructions to set up Kubernetes monitoring and **save the values
in `k8s/kubernetes-monitoring.values.yaml`**.
2. Get the values for the Frontend Observability endpoint and customize the OTLP
   endpoints in case you're not using the default values.

```bash
export FARO_URL=https://my-collector.endpoint
export OTLP_ENDPOINT_HTTP=http://grafana-k8s-monitoring-grafana-agent.faro-shop.svc.cluster.local:4318
export OTLP_ENDPOINT_GRPC=http://grafana-k8s-monitoring-grafana-agent.faro-shop.svc.cluster.local:4317
```

3. Run the following commands:
```bash
# Create a kind cluster
kind create cluster --name faro-shop

# Deploy Kubernetes Monitoring
helm repo add grafana https://grafana.github.io/helm-charts &&
  helm repo update &&
  helm upgrade --install --atomic --timeout 300s grafana-k8s-monitoring grafana/k8s-monitoring \
    --namespace "faro-shop" \
    --create-namespace \
    --values k8s/kubernetes-monitoring.values.yaml

# Deploy the application
helm upgrade --install \
  --create-namespace \
  --namespace faro-shop \
  --set caddy.env.OTEL_EXPORTER_OTLP_TRACES_ENDPOINT=$OTLP_ENDPOINT_GRPC \
  --set app.env.OTEL_EXPORTER_OTLP_ENDPOINT=$OTLP_ENDPOINT_HTTP \
  --set worker.env.OTEL_EXPORTER_OTLP_ENDPOINT=$OTLP_ENDPOINT_HTTP \
  --set app.env.FARO_URL=$FARO_URL \
  faro-shop \
  k8s/charts/faro-shop
```

## Development

### Requirements

- Docker
- PHP 8.3 (`brew install php`)
  - Composer (`brew install composer`)
  - ext-opentelemetey (`pecl install opentelemetry`)
- node.js (`brew install node` OR `nvm use`)

### Running the application

```bash
# Clone the repository
git clone https://github.com/cedricziel/faro-shop.git

# set the variables
cp env.template .env

# Set the variables in the `.env` file

# Install dependencies
composer install

# Run the application
symfony serve
```
